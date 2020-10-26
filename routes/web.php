<?php

use App\model\purchase_invoice_h;
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

    Route::get('/ahmed', function () {
        return purchase_invoice_h::all();
    });

    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('products', 'productController@index');
    Route::get('/product/create', 'productController@create');
    Route::post('/product/create', 'productController@store');
    Route::post('/product/CheckStatus/{id}', 'productController@CheckStatus');
    Route::get('/product/{id}', 'productController@show');
    Route::get('/product/edit/{id}', 'productController@edit');
    Route::put('/product/edit/{id}', 'productController@update');
    Route::get('product/toggleStatus/{product}', 'productController@toggleStatus');

    Route::get('/barcode/{id}', 'productController@barcode');

    Route::get('categories', 'categoryController@index');
    Route::get('/category/create', 'categoryController@create');
    Route::post('/category/create', 'categoryController@store');
    Route::get('/category/{id}', 'categoryController@show');

    Route::get('expense_category','expenseCategoryController@index');
    Route::get('expense_category/create','expenseCategoryController@create');
    Route::post('expense_category/create','expenseCategoryController@store');
    Route::get('expense_category/cancel/{id}', 'expenseCategoryController@cancel');
    Route::get('expense_category/activate/{id}', 'expenseCategoryController@activate');


    Route::get('expenses','expensesController@index');
    Route::get('expense/create','expensesController@create');
    Route::post('expense/create','expensesController@store');

    Route::get('customers', 'customerController@index');
    Route::get('customer/create', 'customerController@create');
    Route::post('customer/create', 'customerController@store');
    Route::get('customer/toggleStatus/{customer}', 'customerController@toggleStatus');
    Route::get('/customer/show/{id}', 'customerController@show');


    Route::get('stocks', 'stockController@index');
    Route::get('/stock/create', 'stockController@create');
    Route::post('/stock/create', 'stockController@store');
    Route::get('/stock/{id}', 'stockController@show');


    Route::get('purchase', 'purchaseController@index');
    Route::get('/purchase/create', 'purchaseController@create');
    Route::post('/purchase/create', 'purchaseController@store');
    Route::get('/purchase/{id}', 'purchaseController@show');
    Route::get('purchases_report', 'purchaseController@purchases_report');
    Route::post('report', 'purchaseController@report');


    Route::get('sales', 'salesController@index');
    Route::get('/sales/{id}', 'salesController@show');
    Route::get('sales_report', 'salesController@sales_report');
    Route::post('sales_report', 'salesController@report');



    Route::get('suppliers', 'supplierController@index');
    Route::get('/supplier/create', 'supplierController@create');
    Route::post('/supplier/create', 'supplierController@store');
    Route::get('/supplier/edit/{id}', 'supplierController@edit');
    Route::post('/supplier/update/{id}', 'supplierController@update');
    Route::get('/supplier/show/{id}', 'supplierController@show');
    Route::get('/supplier/payment/{id}', 'supplierController@payment');
    Route::post('/supplier/payment/{id}', 'supplierController@payment_add_post');


    Route::get('accounts', 'accountController@index');
    Route::get('/account/create', 'accountController@create');
    Route::post('/account/create', 'accountController@store');

    Route::get('users', 'userController@index');
    Route::get('/user/create', 'userController@create');
    Route::post('/user/create', 'userController@store');
    Route::get('/user/cancel/{id}', 'userController@cancel');
    Route::get('/user/activate/{id}', 'userController@activate');

    Route::get('units', 'unitController@index');
    Route::get('unit/create', 'unitController@create');
    Route::post('unit/create', 'unitController@store');


    Route::get('pos', 'posController@index');


    Route::get('general/report', 'salereportController@index');
    Route::post('general/report', 'salereportController@sales');



    Route::get('payments', 'paymentsController@index');
    Route::get('payments/toggle/{id}', 'paymentsController@toggle');
    Route::post('payments/create', 'paymentsController@store');
});

Route::get('/submit', function () {
    $product_name = request()->product_name;
    if (isset($product_name))
        return \App\Model\product::where('name', 'LIKE', '%' . $product_name . '%')->get();
    else {
        return;
    }
});



Route::get('/create_invoice', function () {
    return request()->all();
    // return request('products_table');
});

Route::get('login', 'loginController@index')->name('login');
Route::post('login', 'loginController@store');
