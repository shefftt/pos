<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\purchase_invoice_d;
use App\Model\purchase_invoice_h;
use App\Model\stock_product;
use App\Model\supplier;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function store(Request $request)
    {

        $vat_total = 0;

        // // purchase_invoice_h `supplier_id`, `total`, `stock_id`, `created_at`
        $invoice = purchase_invoice_h::create(
            [
                'supplier_id'       => $request->supplier_id,
                'total'             => $request->total,
                'invoice_number'    => $request->invoice_number,
                'stock_id'          => $request->stock_id,
                'created_by'          => 1,
                'payment_method_id' => $request->payment_method
            ]
        );

        foreach ($request->products_table as $product) {
            $prd =  json_decode($product);
            purchase_invoice_d::create(
                [
                    'product_id'        => json_decode($product)->id,
                    'price'             => json_decode($product)->price,
                    'qyt'               => json_decode($product)->qyt,
                    'current_qyt'       => json_decode($product)->qyt,
                    'vat'               => json_decode($product)->vat,
                    'sub_vat'           => json_decode($product)->vat * json_decode($product)->qyt,
                    'sub_total'         => json_decode($product)->subtotal,
                    'invoice_id'        => $invoice->id
                ]
            );


            $vat_total += json_decode($product)->vat * json_decode($product)->qyt;


            $stock_product = stock_product::firstOrNew(['stock_id' => $request->stock_id, 'product_id' => $prd->id]);
            $stock_product->qyt = $stock_product->qyt + json_decode($product)->qyt;
            $stock_product->save();
        }


        $invoice->vat_total = $vat_total;
        $invoice->save();

        // الكاش - 1
        // بطاقه - 2
        // اجل - 3

        if ($request->payment_method == 3) {  //  اجل
            $supplier = supplier::find($request->supplier_id);
            $supplier->balance  = $supplier->balance + $request->total;
            $supplier->save();
        } elseif ($request->payment_method == 1) {
            // transactions `amount`, `from`, `to`, `transactionable_type`, `transactionable_id`

            $invoice->transaction()->create(['amount' => $request->total, 'to' => 4, 'from' => 1]);

            $invoice->transaction()->create(['amount' => $request->total, 'payment_method_id' => $request->payment_method]);
        }


        // if suppler id using
        return $request->products_table;
    }



}
