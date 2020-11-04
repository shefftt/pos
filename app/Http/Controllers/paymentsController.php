<?php

namespace App\Http\Controllers;

use App\Http\Requests\paymentRequest;
use App\Model\payment;
use Illuminate\Http\Request;


class paymentsController extends Controller
{
    public function index()
    {
        $payments =  payment::all();
        return view('payments.index', compact('payments'));
    }

    public function toggle($id)
    {

        $payment = payment::find($id);
        $payment->status = !$payment->status;
        $payment->save();
        return redirect()->back();
    }

    public function store(paymentRequest $request)
    {
        $validated  = $request->validated();
        payment::create($validated);
        return redirect('payments');
    }
}
