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
        return view('purchases.create', compact('suppliers', 'stocks'));
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

    public function purchases_report(Request $request)
    {
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";
        $suppliers =  supplier::all();
        $payment_methods =  payment::all();

//        $purchases_report = \DB::table('purchase_invoice_h')->whereBetween('created_at', [$from, $to])->get();
        $purchases_report = DB::table('purchase_invoice_h')
            ->where('created_at', '<= ', $from)
            ->where('created_at', '>= ', $to)->get();
        //return $purchases_report;
        return view('purchases.purchases_report', compact('purchases_report','suppliers','payment_methods'));
    }

    public function report(Request $request)
    {

//        return $request;
        $from = request('from'). " 00:00:00";
        $to= request('to'). " 23:59:59";

        $suppliers =  supplier::all();
        $payment_methods =  payment::all();
        // $purchases_report = DB::table('purchase_invoice_h')-> whereBetween('created_at', [$from, $to])->get();

        if (isset(request()->supplier_id) AND request()->payment_method_id  == NULL) {

            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('supplier_id',request()->supplier_id)->get();
            return view('purchases.purchases_report', compact('purchases_report','suppliers','payment_methods'));
        }
        elseif (isset(request()->payment_method_id ) AND request()->supplier_id  == NULL) {
            //$purchases_report = DB::table('purchase_invoice_h')-> whereBetween('created_at', [$from, $to])->where('payment_method_id',request()->payment_method_id)->get();
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id',request()->payment_method_id)->get();

            return view('purchases.purchases_report', compact('purchases_report','suppliers','payment_methods'));

        }

        elseif (isset(request()->supplier_id)and(request()->payment_method_id)){
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->where('payment_method_id',request()->payment_method_id)->where('supplier_id',request()->supplier_id)->get();
            return view('purchases.purchases_report', compact('purchases_report','suppliers','payment_methods'));

        }
        elseif (request()->supplier_id === null AND request()->payment_method_id === null){
            $purchases_report = purchase_invoice_h::whereBetween('created_at', [$from, $to])->get();
            return view('purchases.purchases_report', compact('purchases_report','suppliers','payment_methods'));
        }


        else  return view('purchases.purchases_report', compact('purchases_report','suppliers','payment_methods'));

    }



}
