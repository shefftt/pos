<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
use App\Model\category;
use App\Model\product;
use App\Model\stock;
use App\Model\unit;
use App\Model\stock_product;
use App\Model\purchase_invoice_d;
use DB;

class productController extends Controller
{
    public function index()
    {
        $products =  product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function show($id){
        $product_name = product::find($id);
        $products = stock_product::where('product_id',$id)->get();
        return view('products.show',compact('products','product_name'));

    }


    public function create()
    {
        $units = unit::all();
        $categories =  category::all();
        $stocks     =  stock::all();
        return view('products.create', compact('categories', 'stocks','units'));
    }
    public function edit($id)
    {
        $products   = product::find($id);
        $categories =  category::all();
        $units      =     unit::all();
        $stocks     =  stock::all();
        return view('products.edit', compact('categories', 'stocks','products','units'));
    }
    public function store(productRequest $request)
    {

        $validated  = $request->validated();
        product::create($validated);
        return redirect('products');
    }

    public function update(Request $request,$id)
    {
        $products = product::find($id);
        $products->name            = $request->name;
        $products->category_id     = $request->category_id;
        $products->purchase_price  = $request->purchase_price;
        $products->sale_price      = $request->sale_price;
        $products->stock_id        = $request->stock_id;
        $products->unit_id         =      $request->unit_id;
        $products->qyt             = $request->qyt;
        $products->barcode         = $request->barcode ;
        $products->vat             = $request->vat ;

        $products->save();
        return redirect('products');
    }

    public function CheckStatus($id){
        $products = product::find($id);
        $products->status=0;
        $products->save();
        return redirect('products');
    }


    public function toggleStatus(product $product)
    {
         $product->status = !$product->status;
         $product->save();
        return redirect('products');
    }


    public function barcode($id){

        $product = product::find($id);
        return view('products.barcode',compact('product'));
    }
    public function baraah(){

      //$product = purchase_invoice_d::
       // select(purchase_invoice_d::raw('expir_date'), purchase_invoice_d::raw('sum(qyt) as qyt'))
           //->groupBy(purchase_invoice_d::raw('expir_date') )
          //->get();
//        $product = DB::table('purchase_invoice_d')
//            //->where('product_id', '=', '4')
//            ->where(function ($query) {
//                $query->where('qyt', '<>', '0')
//                    ->Where('expir_date', '>=', today());
//            })
//            ->groupBy('product_id')->get();


        //return view('products.baraah',compact('product'));
        //DB::enableQueryLog();

        $product = product::whereHas('purchases', function ($query){

            $query
//                    ->where('qyt', '>', '0')
//                    ->Where('expir_date', '>=', today())
//                ->groupBy('expir_date')->
                ->with('purchases')
//                ->sum('qyt')
            ;
        })->get();
      return $product ;


    }


}
