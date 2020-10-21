<?php

namespace App\Http\Controllers;
use App\Model\purchase_invoice_h;
use App\Model\stock;
use App\model\supplier;


class purchaseController extends Controller
{
    public function index()
    {
        $purchases =  purchase_invoice_h::paginate(10);
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers =  supplier::all();
        $stocks    =  stock::all();
        return view('purchases.create', compact('suppliers', 'stocks'));
    }

    protected function show($id)
    {

        $invoice =  purchase_invoice_h::find($id);
        return view('purchases.show', compact('invoice'));
    }
}
