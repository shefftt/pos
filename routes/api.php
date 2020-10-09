<?php

use App\Model\customer;
use App\model\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('pos', 'posController@store');
// create_purchase_invoice
Route::get('create_purchase_invoice', 'API\purchaseController@store');

Route::get('/get_product_barcode', function () {
    $product_barcode = request()->product_barcode;
    return \App\Model\product::where('barcode', $product_barcode )->first();
});

Route::get('/stocks', "API\stockController@index");

Route::get('/create_purchase_invoice', "API\purchaseController@store");


Route::get('/create_sales_invoice', "API\salesController@store");


Route::get('/accounts', "API\accountController@index");


Route::get('/suppliers', function(){
    return supplier::all();
});


Route::get('/customers', function(){
    return customer::all();
});

Route::get('/customer/create', function(){

    // $validated  = $request->validated();
    customer::create([
        'name' => request('name') ,
        'phone' => request('phone') ,
        'address' => request('address') ,
    ]);
    return response('done' , 200);
});
