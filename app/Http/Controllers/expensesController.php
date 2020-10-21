<?php

namespace App\Http\Controllers;

use App\model\account;
use App\Model\expense;
use App\Model\expense_category;
use App\Model\stock;
use App\Http\Requests\expensesRequest;
use Illuminate\Http\Request;

class expensesController extends Controller
{
   public function index()
   {
       $expenses = expense::all();
       return view('expenses.index',compact('expenses'));
   }
   public function create(){
        $expense_categories = expense_category::all();
        $stocks             =            stock::all();
        $accounts = account::all();
       return view('expenses.create',compact('stocks','expense_categories','accounts'));
   }
   public function store(expensesRequest $request){

       $validated  = $request->validated();
       expense::create($validated);
       return redirect('expenses');

   }
}
