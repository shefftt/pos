<?php

namespace App\Http\Controllers;

use App\Http\Requests\customerRequest;
use App\Model\customer;
use App\Model\sales_invoice_h;
use App\model\transaction;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        $customers = customer::paginate(10);
        return view('customers.index',compact('customers'));
    }
    public function create()
    {
        return view('customers.create');
    }

    public function store(customerRequest $request)
    {

        $validated  = $request->validated();
        customer::create($validated);
        return redirect('customers');
    }

    public function toggleStatus(customer $customer)
    {
         $customer->status = !$customer->status;
         $customer->save();
        return redirect('customers');
    }

    public function show($id)
    {
        $customer =  customer::find($id);
        // $suppliers_show = transaction::where($id='transactionable_id')->get;
        $customers_show = transaction::where('transactionable_id', '=', $id)->get();

        $invoices = sales_invoice_h::where('customer_id', '=', $id)->paginate(10);

        return view('customers.show',compact('customer','customers_show','invoices'));

    }
}
