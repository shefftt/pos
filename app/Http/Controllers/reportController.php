<?php

namespace App\Http\Controllers;

use App\Model\customer;
use App\Model\payment;
use App\Model\product;
use App\Model\sales_invoice_h;
use App\Model\purchase_invoice_h;
use App\Model\purchase_invoice_d;
use App\Model\sales_invoice_d;
use App\Model\setting;
use App\Model\supplier;
use App\User;
use Illuminate\Http\Request;
use DB;


class reportController extends Controller
{
    public function general()
    {
        $sales = DB::table('sales_invoice_h');
        $sales_d = DB::table('sales_invoice_d');
        $purchase = DB::table('purchase_invoice_h');
        $purchase_d = DB::table('purchase_invoice_d');
        return view('reports.general', compact('sales', 'purchase', 'sales_d', 'purchase_d'));
    }

    public function general_report(Request $request)
    {
        $sales = sales_invoice_h::whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();
        $sales_d = sales_invoice_d::whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();
        $purchase = purchase_invoice_h::whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();
        $purchase_d = purchase_invoice_d::whereBetween('created_at', [$request->start_date, $request->end_date])
            ->get();
        return view('reports.general', compact('sales', 'purchase', 'sales_d', 'purchase_d'));
    }

    public function sales(Request $request)
    {
        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";

        //        $sales_report = \DB::table('purchase_invoice_h')->whereBetween('created_at', [$from, $to])->get();
        $customers = customer::all();
        $payments = payment::all();
        $users = User::all();
        $sales_report = \DB::table('sales_invoice_h')
            ->where('created_at', '<= ', $from)
            ->where('created_at', '>= ', $to)->get();
        //return $purchases_report;
        return view('reports.sales', compact('sales_report', 'customers', 'payments', 'users'));
    }

    public function sales_report(Request $request)
    {
        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";
        $data = $request->all();
        $customers = customer::all();
        $payments = payment::all();
        $users = User::all();

        if (isset(request()->customer_id) and request()->payment_method_id == NULL and request()->created_by == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)->get();

        } elseif (isset(request()->customer_id) and request()->payment_method_id and request()->created_by == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)
                ->where('payment_method_id', request()->payment_method_id)->get();

        } elseif (isset(request()->customer_id) and request()->payment_method_id == NULL and request()->created_by) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('customer_id', request()->customer_id)
                ->where('created_by', request()->created_by)->get();

        } elseif (isset(request()->payment_method_id) and request()->customer_id == NULL and request()->created_by == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->get();

        } elseif (isset(request()->created_by) and request()->customer_id == NULL and request()->payment_method_id == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])
                ->where('created_by', request()->created_by)->get();

        } elseif (isset(request()->created_by) and request()->payment_method_id and request()->customer_id == NULL) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])
                ->where('created_by', request()->created_by)->where('payment_method_id', request()->payment_method_id)->get();

        } elseif (isset(request()->payment_method_id) and request()->customer_id and request()->created_by) {
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->where('customer_id', request()->customer_id)->where('created_by', request()->created_by)->get();

        } else{
            $sales_report = sales_invoice_h::whereBetween('created_at', [$from, $to])->get();

    }
        return view('reports.sales', compact('sales_report', 'from', 'to', 'customers', 'payments', 'users'));
}

    public function purchases()
    {
        $suppliers =  supplier::all();
        $payment_methods =  payment::all();
        $purchases_report = [];
        return view('reports.purchases', compact('suppliers', 'payment_methods'));
    }


    public function purchases_report(Request $request)
    {

        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";


        $suppliers =  supplier::all();
        $setting =  setting::find(1);
        $payment_methods =  payment::all();


        if (isset(request()->supplier_id) and request()->payment_method_id  == NULL) {

            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('supplier_id', request()->supplier_id)->get();
        } elseif (isset(request()->payment_method_id) and request()->supplier_id  == NULL) {
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->get();
        } elseif (isset(request()->supplier_id) and (request()->payment_method_id)) {
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id', request()->payment_method_id)->where('supplier_id', request()->supplier_id)->get();
        } elseif (request()->supplier_id === null and request()->payment_method_id === null) {
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->get();
        }
        return view('reports.purchases', compact('purchases_report', 'suppliers', 'payment_methods', 'setting', 'from', 'to'));
    }

    public function product(){
        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";
        $all = product::all();
        $stocks = stock::all();
        $products = product::all();
        return view('reports.product', compact('all','products','stocks'));

    }
    public function product_report(Request $request){
        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";
        $products = product::all();
        $stocks = stock::all();

        if (isset(request()->product_id) and request()->stock_id) {

            $products = product::whereBetween('created_at', [$from, $to])->where('id', request()->product_id)->where('stock_id',request()->stock_id)->get();
        }
          elseif(isset(request()->stock_id) and request()->product_id === null) {

            $products = product::whereBetween('created_at', [$from, $to])->where('stock_id',request()->stock_id)->get();
        }
            elseif(isset(request()->product_id) and request()->stock_id === null) {

            $products = product::whereBetween('created_at', [$from, $to])->where('id',request()->product_id)->get();
        }
        elseif (request()->product_id === null ){
            $products = product::whereBetween('created_at', [$from, $to])
                ->get();

        }


        return view('reports.product', compact('products','stocks'));
    }

    public function profits(){

        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";
        $sales_profits = sales_invoice_d::where('created_at', '<= ', $from)
            ->where('created_at', '>= ', $to)->get();
        $products = product::all();
        //return $purchases_report;
        return view('reports.profits', compact('sales_profits','products','from','to'));
    }

    public function profits_report()
    {
        $from = request('from') . " 00:00:00";
        $to = request('to') . " 23:59:59";
        $users  = User::all();
        $products = product::all();
        $sales_profits = sales_invoice_d::all();
        if (isset(request()->product_id)) {

            $sales_profits = sales_invoice_d::whereBetween('created_at', [$from, $to])->where('product_id', request()->product_id)->get();
        }
        elseif (request()->product_id === null) {
            $sales_profits = sales_invoice_d::whereBetween('created_at', [$from, $to])
                ->get();
        }
        else
            $sales_profits = sales_invoice_d::whereBetween('created_at', [$from, $to])->get();

        return view('reports.profits', compact('sales_profits','products','from','to'));
    }

}
