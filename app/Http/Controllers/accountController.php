<?php

namespace App\Http\Controllers;
use App\Http\Requests\accountRequest;
use App\Model\stock;
use App\model\account;
use App\model\payment;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index()
    {
        $payments = payment::all();
        return view('accounts.index', compact('payments'));
    }

    public function create()
    {

        $payments = payment::all();
        return view('accounts.create', compact('payments'));
    }

    public function store(accountRequest $request)
    {
        $validated  = $request->validated();

        account::create($validated);
        return redirect('accounts');
    }

}
