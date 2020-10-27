<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\model\purchase_invoice_d;
use App\model\purchase_invoice_h;
use App\Model\sales_invoice_d;
use App\Model\sales_invoice_h;
use App\model\supplier;
use Illuminate\Http\Request;

class salesController extends Controller
{
    public function store(Request $request)
    {


        // products_table: this.products_table,
        // total: this.total,
        // customer_id: this.customer_id,
        // payment_method: this.payment_method
        // // purchase_invoice_h `supplier_id`, `total`, `stock_id`, `created_at`
        $invoice = sales_invoice_h::create(
            [
                'customer_id'       => $request->customer_id,
                'total'             => $request->total,
                'payment_method_id' => $request->payment_method
            ]
        );

        foreach ($request->products_table as $product) {

            sales_invoice_d::create(
                [
                    'product_id'        => json_decode($product)->id,
                    'price'             => json_decode($product)->price,
                    'vat'               => json_decode($product)->vat,
                    'sub_vat'           => json_decode($product)->vat * json_decode($product)->qyt,
                    'qyt'               => json_decode($product)->qyt,
                    'sub_total'         => json_decode($product)->subtotal,
                    'invoice_id'        => $invoice->id
                ]
            );
        }



            // الكاش - 1
            // بطاقه - 2
            // اجل - 3

        if ($request->payment_method == 3) {  //  اجل
            $supplier = supplier::find($request->supplier_id);
            $supplier->balance  = $supplier->balance + $request->total;
            $supplier->save();
        }elseif ($request->payment_method == 1) {
            // transactions `amount`, `from`, `to`, `transactionable_type`, `transactionable_id`

            $invoice->transaction()->create(['amount' => $request->total , 'to' => 4 , 'from' => 1]);
        }


        // if suppler id using
        return $request->products_table;
    }
}
