<?php

namespace App\Http\Controllers;
use App\Model\customer;
use App\model\payment;
use App\Model\sales_invoice_h;
use App\Model\purchase_invoice_h;
use App\Model\purchase_invoice_d;
use App\Model\sales_invoice_d;
use App\model\supplier;
use App\User;
use Illuminate\Http\Request;
use DB;


class reportController extends Controller
{
    public function general(){
        $sales = DB::table('sales_invoice_h');
        $sales_d = DB::table('sales_invoice_d');
        $purchase = DB::table('purchase_invoice_h');
        $purchase_d = DB::table('purchase_invoice_d');
        return view('reports.general', compact('sales','purchase','sales_d','purchase_d'));

    }
    public function general_report(Request $request)
    {
        $sales = sales_invoice_h::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        $sales_d = sales_invoice_d::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        $purchase = purchase_invoice_h::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        $purchase_d = purchase_invoice_d::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        return view('reports.general', compact('sales','purchase','sales_d','purchase_d'));

    }
    public function sales(Request $request)
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
        return view('reports.sales', compact('sales_report','customers','payments','users'));
    }

    public function sales_report(Request $request)
    {
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";
        $data = $request->all();
        $customers = customer::all();
        $payments = payment::all();
        $users  = User::all();

        if(isset(request()->customer_id) AND request()->payment_method_id == NULL AND request()->created_by == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)->get();
            return view('reports.sales', compact('sales','from','to','customers','payments','users'));

        }   elseif(isset(request()->customer_id) AND request()->payment_method_id  AND request()->created_by == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)
                ->where('payment_method_id', request()->payment_method_id)->get();
            return view('reports.sales', compact('sales_report', 'from', 'to', 'customers', 'payments', 'users'));
        }

        elseif(isset(request()->customer_id) AND request()->payment_method_id == NULL  AND request()->created_by) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)
                ->where('created_by', request()->created_by)->get();
            return view('reports.sales', compact('sales_report','from','to','customers','payments','users'));
        }

        elseif(isset(request()->payment_method_id) AND  request()->customer_id == NULL AND request()->created_by == NULL){
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->get();
            return view('reports.sales', compact('sales_report','from','to','customers','payments','users'));

        }


        elseif(isset(request()->created_by) AND request()->customer_id == NULL   AND request()->payment_method_id == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])
                ->where('created_by', request()->created_by)->get();
            return view('reports.sales', compact('sales_report','from','to','customers','payments','users'));
        }

        elseif(isset(request()->created_by) AND request()->customer_id == NULL   AND request()->payment_method_id) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])
                ->where('created_by', request()->created_by)->where(request()->payment_method_id)->get();
            return view('reports.sales', compact('sales_report','from','to','customers','payments','users'));
        }

        elseif(isset(request()->payment_method_id) AND  request()->customer_id AND request()->created_by ){
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->
            where('customer_id', request()->customer_id)->where('created_by',request()->created_by)->get();
            return view('reports.sales', compact('sales_report','from','to','customers','payments','users'));
        }

        else
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->get();
        return view('reports.sales', compact('sales_report','from','to','customers','payments','users'));

    }

    public function purchases(Request $request)
    {
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";
        $suppliers =  supplier::all();
        $payment_methods =  payment::all();

//        $purchases_report = \DB::table('purchase_invoice_h')->whereBetween('created_at', [$from, $to])->get();
        $purchases_report = DB::table('purchase_invoice_h')
            ->where('created_at', '<= ', $from)
            ->where('created_at', '>= ', $to)->get();
        //return $purchases_report;
        return view('reports.purchases', compact('purchases_report','suppliers','payment_methods'));
    }

    public function purchases_report(Request $request)
    {

//        return $request;
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";

        $suppliers =  supplier::all();
        $payment_methods =  payment::all();
        // $purchases_report = DB::table('purchase_invoice_h')-> whereBetween('created_at', [$from, $to])->get();

        if (isset(request()->supplier_id) AND request()->payment_method_id  == NULL) {

            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('supplier_id',request()->supplier_id)->get();
            return view('reports.purchases', compact('purchases_report','suppliers','payment_methods'));
        }
        elseif (isset(request()->payment_method_id ) AND request()->supplier_id  == NULL) {
            //$purchases_report = DB::table('purchase_invoice_h')-> whereBetween('created_at', [$from, $to])->where('payment_method_id',request()->payment_method_id)->get();
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id',request()->payment_method_id)->get();

            return view('reports.purchases', compact('purchases_report','suppliers','payment_methods'));

        }

        elseif (isset(request()->supplier_id)and(request()->payment_method_id)){
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id',request()->payment_method_id)->where('supplier_id',request()->supplier_id)->get();
            return view('reports.purchases', compact('purchases_report','suppliers','payment_methods'));

        }
        elseif (request()->supplier_id === null AND request()->payment_method_id === null){
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->get();
            return view('reports.purchases', compact('purchases_report','suppliers','payment_methods'));
        }


        else  return view('reports.purchases', compact('purchases_report','suppliers','payment_methods'));

    }
}
