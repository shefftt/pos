<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\stock;
use Illuminate\Http\Request;

class stockController extends Controller
{
    public function index()
    {
        return stock::all();
    }
}
