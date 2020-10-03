<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ahmed hmed

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('products', 'productController@index');
    Route::get('/product/create', 'productController@create');
    Route::post('/product/create', 'productController@store');


    Route::get('categories', 'categoryController@index');
    Route::get('/category/create', 'categoryController@create');
    Route::post('/category/create', 'categoryController@store');

    Route::get('customers', 'customerController@index');


    Route::get('stocks', 'stockController@index');
    Route::get('/stock/create', 'stockController@create');
    Route::post('/stock/create', 'stockController@store');


    Route::get('purchase', 'purchaseController@index');
    Route::get('/purchase/create', 'purchaseController@create');
    Route::post('/purchase/create', 'purchaseController@store');
    Route::get('/purchase/{id}', 'purchaseController@show');

    Route::get('sales', 'salesController@index');



    Route::get('suppliers', 'supplierController@index');
    Route::get('/supplier/create', 'supplierController@create');
    Route::post('/supplier/create', 'supplierController@store');

    Route::get('/pos', 'supplierController@create');
});
    Route::get('pos', 'posController@index');

    Route::get('/submit', function () {
        $product_name = request()->product_name;
        return \App\Model\product::where('name', 'LIKE', '%' . $product_name . '%')->get();
    });

    Route::get('/create_invoice', function () {
        return request()->all();
        // return request('products_table');
    });

    Route::get('login', 'loginController@index')->name('login');
    Route::post('login', 'loginController@store');
