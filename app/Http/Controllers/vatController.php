<?php

namespace App\Http\Controllers;
use App\Http\Requests\vatRequest;
use App\Model\vat;
use Illuminate\Http\Request;

class vatController extends Controller
{
    public function index(){
        $vats = vat::all();
        return view('vat.index',compact('vats'));
    }
    public function create(){

        return view('vat.create');
    }
    public function edit($id)
    {
        $vat =  vat::find($id);
        return view('vat.edit', compact('vat'));
    }
    public function update(Request $request,$id)
    {
        $vat = vat::find($id);

        $vat->vat    = $request->vat ;

        $vat->save();
        return redirect('vat');
    }
    public function store(vatRequest $request)
    {
        $validated  = $request->validated();
        vat::create($validated);
        return redirect('vat');
    }

}
