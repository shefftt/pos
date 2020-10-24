<?php

namespace App\Http\Controllers;
use App\Http\Requests\accountRequest;
use App\Model\stock;
use App\model\account;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index()
    {
        $accounts =  account::paginate(10);
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {

        $accounts =  account::all();
        return view('accounts.create', compact('accounts'));
    }

    public function store(accountRequest $request)
    {
        $validated  = $request->validated();

        account::create($validated);
        return redirect('accounts');
    }

}
