<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Model\category;
use App\Model\sales_invoice_h;
use Carbon\Carbon;
use Illuminate\Http\Request;


class dashboardController extends Controller
{
    public function index()
    {

        $posts = sales_invoice_h::whereDate('created_at', Carbon::today())->get();
        return $posts->sum('total');
        return view('dashboard');
    }

}
