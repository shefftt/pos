<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\model\payment;

class paymentsController extends Controller
{
    public function index()
    {
        return payment::all();
    }

}
