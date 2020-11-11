<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\customer;
use App\Model\purchase_invoice_d;
use App\Model\purchase_invoice_h;
use App\Model\sales_invoice_d;
use App\Model\sales_invoice_h;
use App\Model\supplier;
use App\Model\product;
use App\Model\stock_product;
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
        $stock_id = 1; //TODO:: replace this number with stock id for this POS

        $invoice = sales_invoice_h::create(
            [
                'customer_id'       => $request->customer_id,
                'total'             => $request->total,
                'payment_method_id' => $request->payment_method,
                'vat_total'         => $request->vat,
                'discount'          => $request->discount_amount,
                // 'created_by'        => auth()->user()->id
                'created_by'        => 1
            ]
        );

        foreach ($request->products_table as $product) {


            $product_model = product::find(json_decode($product)->id);
            $stock_product = stock_product::where('product_id', $stock_id)->first();


            sales_invoice_d::create(
                [
                    'product_id'        => json_decode($product)->id,
                    'price'             => json_decode($product)->price,
                    'qyt'               => json_decode($product)->qyt,
                    'sub_total'         => json_decode($product)->subtotal,
                    'ratio'             => $product_model->ratio,
                    'invoice_id'        => $invoice->id
                ]
            );

            if ($request->invoice_type == "refund") {

                $product_model->qyt = $product_model->qyt + json_decode($product)->qyt;
                $product_model->save();

                $stock_product->qyt = $stock_product->qyt + json_decode($product)->qyt;
                $stock_product->save();


                $invoice->invoice_type = $request->invoice_type;
                $invoice->reference = $request->reference;
                $invoice->save();


            } else {
                $product_model->qyt = $product_model->qyt - json_decode($product)->qyt;
                $product_model->save();


                $stock_product->qyt = $stock_product->qyt - json_decode($product)->qyt;
                $stock_product->save();
            }
        }


        // الكاش - 1
        // شبكه - 2
        // اجل - 3

        if ($request->payment_method == 3) {  //  اجل

            $customer = customer::find($request->customer_id);

            if ($request->invoice_type == "refund") {
                $customer->balance  = $customer->balance - $request->total;
                $customer->save();
            } else {
                $customer->balance  = $customer->balance + $request->total;
                $customer->save();
            }
        } else {
            $invoice->transaction()->create(['amount' => $request->total, 'payment_method_id' => $request->payment_method]);
        }


        // if suppler id using
        return ['invoice_id' => $invoice->id];
    }
}
