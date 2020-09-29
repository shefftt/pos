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


    Route::get('stocks', 'stockController@index');
    Route::get('/stock/create', 'stockController@create');
    Route::post('/stock/create', 'stockController@store');


    Route::get('purchase', 'purchaseController@index');
    Route::get('/purchase/create', 'purchaseController@create');
    Route::post('/purchase/create', 'purchaseController@store');
    Route::get('/purchase/{id}', 'purchaseController@show');


    Route::get('suppliers', 'supplierController@index');
    Route::get('/supplier/create', 'supplierController@create');
    Route::post('/supplier/create', 'supplierController@store');

});


Route::get('login', 'loginController@index')->name('login');
Route::post('login', 'loginController@store');
Route::get('logout', 'loginController@logout');
