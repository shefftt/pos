<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\model\account;
use App\Model\stock;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function index()
    {
        return account::where('selectable' , '>', 0)->get();
    }
}
