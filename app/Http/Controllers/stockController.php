<?php

namespace App\Http\Controllers;


use App\Http\Requests\stockRequest;
use App\Model\stock;
use Illuminate\Http\Request;
use App\Model\purchase_invoice_d;

class stockController extends Controller
{
    public function index()
    {
        $stocks =  stock::all();
        return view('stocks.index', compact('stocks'));
    }


    public function show($id){

        $stocks =  stock::find($id);
      //  return  $stocks->purchase_invoice_d;


     // return $users;

        return view('stocks.show', compact('stocks'));

    }

    public function create()
    {
        $stocks =  stock::all();
        return view('stocks.create', compact('stocks'));
    }

    public function store(stockRequest $request)
    {
        $validated  = $request->validated();

        stock::create($validated);
        return redirect('stocks');
    }
}
