<?php

namespace App\Http\Controllers;
use App\Model\customer;
use App\Model\sales_invoice_h;
use App\Model\purchase_invoice_h;
use App\Model\purchase_invoice_d;
use App\Model\sales_invoice_d;
use Illuminate\Http\Request;
use DB;


class reportController extends Controller
{
    public function general(){
        $sales = DB::table('sales_invoice_h');
        $sales_d = DB::table('sales_invoice_d');
        $purchase = DB::table('purchase_invoice_h');
        $purchase_d = DB::table('purchase_invoice_d');
        return view('reports.sale', compact('sales','purchase','sales_d','purchase_d'));

    }
    public function report(Request $request)
    {
        $sales = sales_invoice_h::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        $sales_d = sales_invoice_d::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        $purchase = purchase_invoice_h::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        $purchase_d = purchase_invoice_d::whereBetween('created_at',[$request->start_date,$request->end_date])
            ->get();
        return view('reports.sale', compact('sales','purchase','sales_d','purchase_d'));

    }
}
