<?php

namespace App\Http\Controllers;

use App\Model\customer;
use App\model\payment;
use App\Model\sales_invoice_h;
use App\User;
use Illuminate\Http\Request;

class salesController extends Controller
{
    public function index()
    {
        $sales =  sales_invoice_h::all();
        return view('sales.index',compact('sales'));
    }

    protected function show($id)
    {

        $invoice =  sales_invoice_h::find($id);

        return view('sales.show', compact('invoice'));
    }
    public function invoice(){
        return view('pos.invoice');

    }

    public function sales_report(Request $request)
    {
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";

//        $sales_report = \DB::table('purchase_invoice_h')->whereBetween('created_at', [$from, $to])->get();
        $customers = customer::all();
        $payments = payment::all();
        $users  = User::all();
        $sales_report = \DB::table('sales_invoice_h')
            ->where('created_at', '<= ', $from)
            ->where('created_at', '>= ', $to)->get();
        //return $purchases_report;
        return view('sales.sales_report', compact('sales_report','customers','payments','users'));
    }

    public function report(Request $request)
    {
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";
        $data = $request->all();
        $customer_id = $data['customer_id'];
        $created_by = $data['created_by'];
        $payment_method_id = $data['payment_method_id'];
        $customers = customer::all();
        $payments = payment::all();
        $users  = User::all();

         if(isset(request()->customer_id) AND request()->payment_method_id == NULL AND request()->created_by == NULL) {
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)->get();
             return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));

         }   elseif(isset(request()->customer_id) AND request()->payment_method_id  AND request()->created_by == NULL) {
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)
                 ->where('payment_method_id', request()->payment_method_id)->get();
             return view('sales.sales_report', compact('sales_report', 'from', 'to', 'customers', 'payments', 'users'));
         }

         elseif(isset(request()->customer_id) AND request()->payment_method_id == NULL  AND request()->created_by) {
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)
                 ->where('created_by', request()->created_by)->get();
             return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));
         }

         elseif(isset(request()->payment_method_id) AND  request()->customer_id == NULL AND request()->created_by == NULL){
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->get();
             return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));

         }


         elseif(isset(request()->created_by) AND request()->customer_id == NULL   AND request()->payment_method_id == NULL) {
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])
                 ->where('created_by', request()->created_by)->get();
             return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));
         }

         elseif(isset(request()->created_by) AND request()->customer_id == NULL   AND request()->payment_method_id) {
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])
                 ->where('created_by', request()->created_by)->where(request()->payment_method_id)->get();
             return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));
         }

         elseif(isset(request()->payment_method_id) AND  request()->customer_id AND request()->created_by ){
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->
             where('customer_id', request()->customer_id)->where('created_by',request()->created_by)->get();
             return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));
         }

         else
             $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->get();
        return view('sales.sales_report', compact('sales_report','from','to','customers','payments','users'));

    }
}
