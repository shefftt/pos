<?php

namespace App\Http\Controllers;

use App\Http\Requests\customerRequest;
use App\Model\customer;
use App\Model\expense_category;
use Illuminate\Http\Request;

class expenseCategoryController extends Controller
{
    public function index()
    {
        $expense_categories = expense_category::all();
        return view('expense_category.index',compact('expense_categories'));
    }
    public function create()
    {
      return view('expense_category.create');
    }

    public function store(Request $request)
    {
        $expense_categories = new expense_category();
        $expense_categories->name = $request->name;
        $expense_categories->save();
       return redirect('expense_category');

    }
    public function cancel($id)
    {
        $expense_categories = expense_category::find($id);
        $expense_categories->status  = 0;


        $expense_categories->save();
        return redirect('expense_category');
    }

    public function activate($id)
    {
        $expense_categories = expense_category::find($id);
        $expense_categories->status  = 1;


        $expense_categories->save();
        return redirect('expense_category');
    }

    public function toggleStatus()
    {

    }
}
