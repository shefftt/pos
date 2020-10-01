<?php

namespace App\Http\Controllers;

use App\Model\sales_invoice_h;
use Illuminate\Http\Request;

class salesController extends Controller
{
    public function index()
    {
        $sales =  sales_invoice_h::paginate(10);
        return view('sales.index',compact('sales'));
    }
}
