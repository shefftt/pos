<?php

namespace App\Http\Controllers;
use App\Model\purchase_invoice_h;
use App\Model\purchase_invoice_d;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function index()
    {
        $purchases =  purchase_invoice_h::paginate(10);
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $purchase_invoice_h =  purchase_invoice_h::all();
        $purchase_invoice_d =  purchase_invoice_d::all();
        return view('purchases.create', compact('purchase_invoice_h','purchase_invoice_d'));
    }
}
