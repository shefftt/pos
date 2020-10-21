<?php

namespace App\Http\Controllers;
use App\Http\Requests\unitRequest;
use App\Model\unit;
use Illuminate\Http\Request;

class unitController extends Controller
{
   public function index(){
       $units = unit::all();
       return view('units.index',compact('units'));
   }
     public function create(){

       return view('units.create');
   }
    public function store(unitRequest $request)
    {
        $validated  = $request->validated();
        unit::create($validated);
        return redirect('units');
    }

}
