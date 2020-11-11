<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Model\category;
use Illuminate\Http\Request;


class categoryController extends Controller
{
    public function index()
    {
        $categories =  category::all();
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

    public function edit($id)
    {
        $category   = category::find($id);
        $categories =  category::all();
        return view('categories.edit', compact('categories', 'category'));
    }



    public function update(categoryRequest $request)
    {
        $validated  = $request->validated();


        $category = category::find($request->id);
        $category->name = $request->name;
        $category->sub_id = $request->sub_id;
        $category->save();
        return redirect('categories');
    }

}
