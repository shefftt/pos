<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Model\category;
use App\Model\product;
use App\Model\stock;

class productController extends Controller
{
    public function index()
    {
        $products =  product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }


    public function create()
    {
        $categories =  category::all();
        $stocks     =  stock::all();
        return view('products.create', compact('categories', 'stocks'));
    }

    public function store(productRequest $request)
    {

        $validated  = $request->validated();
        product::create($validated);
        return redirect('products');
    }
}
