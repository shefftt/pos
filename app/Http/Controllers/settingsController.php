<?php

namespace App\Http\Controllers;

use App\Http\Requests\paymentRequest;
use App\Model\payment;
use App\Model\setting;
use Illuminate\Http\Request;


class settingsController extends Controller
{
    public function index()
    {
        $setting =  setting::find(1);
        return view('settings.index', compact('setting'));
    }

    public function edit($id)
    {
        $setting =  setting::find($id);
        return view('settings.edit', compact('setting'));
    }

    public function store(paymentRequest $request)
    {
        $validated  = $request->validated();
        payment::create($validated);
        return redirect('payments');
    }
}
