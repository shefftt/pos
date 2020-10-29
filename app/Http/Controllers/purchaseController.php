<?php

namespace App\Http\Controllers;
use App\Model\purchase_invoice_h;
use App\Model\stock;
use App\model\supplier;
use App\Model\payment;
use DB;
use Illuminate\Http\Request;



class purchaseController extends Controller
{
    public function index()
    {
        $purchases =  purchase_invoice_h::all();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers =  supplier::all();
        $stocks    =  stock::all();
        $purchase = "purchase";
        return view('purchases.create', compact('suppliers', 'stocks' ,'purchase'));
    }

    protected function show($id)
    {

        $invoice =  purchase_invoice_h::find($id);

        return view('purchases.show', compact('invoice'));
    }

    public function search(Request $request)
    {

        $output="";
//            $products= purchase_invoice_h::where('invoice_number',$request->search)->get();
        $products= purchase_invoice_h::where('invoice_number','LIKE','%'.$request->search."%")->get();
        if($products)
        {
            foreach ($products as  $product) {
                $x = $product->total - $product->transaction->sum('amount');
                '</tr>';
                $output.='<tr>'.
                    '<td>'.$product->id.'</td>'.
                    '<td>'.$product->supplier->name.'</td>'.
                    '<td>'.$product->stock->name.'</td>'.
                    '<td>'.$product->total.'</td>'.
                    '<td>'.$product->created_at.'</td>'.
                    '<td>'.$x.'</td>'.
                    '<td><a class="btn btn-sm btn-primary" href="'.url('/purchase/').'/'.$product->id.'" role="button">عرض</a>

                    </td>';
            }
            return Response($output);
        }

    }


}
