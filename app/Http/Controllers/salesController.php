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

}
