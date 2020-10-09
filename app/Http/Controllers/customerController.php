<?php

namespace App\Http\Controllers;

use App\Http\Requests\customerRequest;
use App\Model\customer;
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
}
