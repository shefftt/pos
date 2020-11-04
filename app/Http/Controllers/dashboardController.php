<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Model\category;
use App\Model\payment;
use App\Model\product;
use App\Model\purchase_invoice_h;
use App\Model\sales_invoice_h;
use App\Model\supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;


class dashboardController extends Controller
{
    public function index()
    {
        $sales = sales_invoice_h::latest('created_at')->take(5)->get();
        $purchase = purchase_invoice_h::latest('created_at')->take(5)->get();
        $sales_statistics = sales_invoice_h::whereDate('created_at', Carbon::today())->get();
        $supplier = supplier::count();
        $product = product::count();

        return view('dashboard', compact('purchase' ,'sales', 'sales_statistics' , 'supplier' , 'product'));
    }
}
