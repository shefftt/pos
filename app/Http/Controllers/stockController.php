<?php

namespace App\Http\Controllers;


use App\Http\Requests\stockRequest;
use App\Model\stock;
use Illuminate\Http\Request;

class stockController extends Controller
{
    public function index()
    {
        $stocks =  stock::paginate(10);
        return view('stocks.index', compact('stocks'));
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
