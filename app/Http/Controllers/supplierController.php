<?php

namespace App\Http\Controllers;

use App\Http\Requests\supplierRequest;
use App\Model\stock;
use App\Model\supplier;
use App\Model\transaction;
use App\Model\purchase_invoice_h;
use Illuminate\Http\Request;
use App\Http\Requests\transactionRequest;
use App\Model\account;

class supplierController extends Controller
{
    public function index()
    {
        $suppliers =  supplier::paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }


    public function create()
    {

        $suppliers =  supplier::all();
        return view('suppliers.create', compact('suppliers'));
    }

    public function store(supplierRequest $request)
    {
        $validated  = $request->validated();

        supplier::create($validated);
        return redirect('suppliers');
    }

    public function edit($id)
    {
        $supplier =  supplier::find($id);

        return view('suppliers.edit',compact('supplier'));
    }


    public function update(Request $request, supplier $supplier)
    {

        $supplier->name       = $request->name;
        $supplier->phone      = $request->phone;
        $supplier->address    = $request->address;
        $supplier->tax_number = $request->tax_number;
        $supplier->an_other_phone = $request->an_other_phone;
        $supplier->note = $request->note;

        $supplier->save();

        return redirect('suppliers');
    }


    public function show($id)
    {
        $supplier =  supplier::find($id);
       // $suppliers_show = transaction::where($id='transactionable_id')->get;
        $suppliers_show = transaction::where('transactionable_id', '=', $id)->get();

        $invoices = purchase_invoice_h::where('supplier_id', '=', $id)->paginate(10);

        return view('suppliers.show',compact('supplier','suppliers_show','invoices'));

    }

    public function payment($id)
    {
        $payment =  transaction::find($id);
        $accounts =  account::all();
        return view('suppliers.payment',compact('payment' ,'accounts'));
    }


    public function payment_add_post(transactionRequest $request)
    {
        $validated  = $request->validated();

        transaction::create($validated);
        return redirect('suppliers');
    }

}
