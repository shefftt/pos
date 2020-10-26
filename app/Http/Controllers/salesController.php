<?php

namespace App\Http\Controllers;

use App\Model\sales_invoice_h;
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
        $sales_report = \DB::table('sales_invoice_h')
            ->where('created_at', '<= ', $from)
            ->where('created_at', '>= ', $to)->get();
        //return $purchases_report;
        return view('sales.sales_report', compact('sales_report'));
    }

    public function report(Request $request)
    {
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";


        $sales_report = \DB::table('sales_invoice_h')-> whereBetween('created_at', [$from, $to])->get();
        return view('sales.sales_report', compact('sales_report','from','to'));

    }
}
