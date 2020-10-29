<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\customer;
use App\model\purchase_invoice_d;
use App\model\purchase_invoice_h;
use App\Model\sales_invoice_d;
use App\Model\sales_invoice_h;
use App\model\supplier;
use App\model\product;
use Illuminate\Http\Request;

class salesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => [
        //     'index'
        // ]]);
    }
    public function store(Request $request)
    {
        $vat_total = 0;

        $invoice = sales_invoice_h::create(
            [
                'customer_id'       => $request->customer_id,
                'total'             => $request->total,
                'payment_method_id' => $request->payment_method,
                // 'created_by'        => auth()->user()->id
                'created_by'        => 1
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

            $vat_total += json_decode($product)->vat * json_decode($product)->qyt;
        }

        $invoice->vat_total = $vat_total;
        $invoice->save();


        foreach ($request->products_table as $product) {


            $id = json_decode($product)->id;
            $product_qyt = product::findOrFail($id);

            $product_qyt->qyt = $product_qyt->qyt - json_decode($product)->qyt;
            $product_qyt->save();
        }
        // الكاش - 1
        // شبكه - 2
        // اجل - 3

        if ($request->payment_method == 3) {  //  اجل
            $customer = customer::find($request->customer_id);
            $customer->balance  = $customer->balance + $request->total;
            $customer->save();
        } else {
            $invoice->transaction()->create(['amount' => $request->total, 'payment_method_id' => $request->payment_method]);
        }


        // if suppler id using
        return ['invoice_id' => $invoice->id];
    }
}
