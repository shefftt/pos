<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
    public function edit($id)
    {
        $products = product::find($id);
        $categories =  category::all();
        $stocks     =  stock::all();
        return view('products.edit', compact('categories', 'stocks','products'));
    }

    public function update(Request $request,$id)
    {
        $products = product::find($id);
        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->purchase_price = $request->purchase_price;
        $products->sale_price = $request->sale_price;
        $products->stock_id = $request->stock_id;
        $products->qyt = $request->qyt;
        $products->save();
        return redirect('products');
    }



}
