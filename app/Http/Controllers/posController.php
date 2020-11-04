<?php

namespace App\Http\Controllers;

use App\Model\product;
use App\Model\setting;
use Illuminate\Http\Request;

class posController extends Controller
{
    public function index()
    {
        $products = product::take(10)->get();
        $setting = setting::find(1);
        return view('pos.index', compact('products','setting'));
    }

    public function print()
    {

        return view('pos.invoice');
    }

    public function store(Request $request)
    {

        // return $request->products_table;
        // {"params":{"products_table":[{"id":1,"name":"اسم المنتج","price":1000,"qyt":1,"subtotal":1000}],"total":1000}}
        if($request->products_table === null){
            return response('عفوا لايمك ارسال سله فارغه', 204)
            // ->header('Content-Type', 'text/plain');
            ;
        }
        foreach($request->products_table as $products){

        }
        return $request->products_table;
    }
}
