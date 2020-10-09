<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Model\category;
use Illuminate\Http\Request;


class categoryController extends Controller
{
    public function index()
    {
        $categories =  category::paginate(10);
        return view('categories.index', compact('categories'));
    }
    public function show($id){
        $categories = category::find($id);
        return view('categories.show',compact('categories'));
    }


    public function create()
    {
        $categories =  category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(categoryRequest $request)
    {
        $validated  = $request->validated();

        category::create($validated);
        return redirect('categories');
    }
}
