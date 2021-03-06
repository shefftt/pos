<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\purchase_invoice_d;
use App\Model\purchase_invoice_h;
use App\Model\stock_product;
use App\Model\supplier;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function store(Request $request)
    {


        // // purchase_invoice_h `supplier_id`, `total`, `stock_id`, `created_at`
        $invoice = purchase_invoice_h::create(
            [
                'supplier_id'       => $request->supplier_id,
                'total'             => $request->total,
                'invoice_number'    => $request->invoice_number,
                'stock_id'          => $request->stock_id,
                'vat_total'         => $request->vat,
                'discount'          => $request->discount_amount,
                'created_by'          => 1, //TODO: replace this number with login user
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
                    'sub_total'         => json_decode($product)->subtotal,
                    'invoice_id'        => $invoice->id
                ]
            );

            $product_model = product::find(json_decode($product)->id);

            if ($request->invoice_type == "refund") {
                $product_model->qyt = $product_model->qyt - json_decode($product)->qyt;
                $product_model->save();

                $stock_product = stock_product::firstOrNew(['stock_id' => $request->stock_id, 'product_id' => $prd->id]);
                $stock_product->qyt = $stock_product->qyt - json_decode($product)->qyt;
                $stock_product->save();

                $invoice->invoice_type = $request->invoice_type;
                $invoice->reference = $request->reference;
                $invoice->save();
            } else {
                $product_model->qyt = $product_model->qyt + json_decode($product)->qyt;
                $product_model->save();

                $stock_product = stock_product::firstOrNew(['stock_id' => $request->stock_id, 'product_id' => $prd->id]);
                $stock_product->qyt = $stock_product->qyt + json_decode($product)->qyt;
                $stock_product->save();
            }
        }


        // الكاش - 1
        // بطاقه - 2
        // اجل - 3

        if ($request->payment_method == 3) {  //  اجل
            if ($request->invoice_type == "refund") {
                $supplier = supplier::find($request->supplier_id);
                $supplier->balance  = $supplier->balance - $request->total;
                $supplier->save();
            } else {
                $supplier = supplier::find($request->supplier_id);
                $supplier->balance  = $supplier->balance + $request->total;
            }
        } else{
            $invoice->transaction()->create(['amount' => $request->total, 'payment_method_id' => $request->payment_method]);
        }


        //TODO: return value as response with status code 201 to tell clint invoice has been created

        return $request->products_table;
    }
}
