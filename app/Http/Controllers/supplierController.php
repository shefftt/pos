<?php

namespace App\Http\Controllers;

use App\Http\Requests\supplierRequest;
use App\Model\stock;
use App\model\supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index()
    {
        $suppliers =  supplier::all();
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
}
