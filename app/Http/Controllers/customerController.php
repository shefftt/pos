<?php

namespace App\Http\Controllers;

use App\Model\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index()
    {
        $customers = customer::paginate(10);
        return view('customers.index',compact('customers'));
    }
}
