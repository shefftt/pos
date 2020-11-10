<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\productRequest;
use App\Model\category;
use App\Model\product;
use App\Model\stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function index()
    {

        return product::where('prid', 1)->first()->product_name;
        return product::paginate();
        return view('auth.login');
    }

    public function store(loginRequest $request)
    {

        $validated  = $request->validated();

        if (Auth::attempt($validated)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            Session::flash('message', 'البريد الالكترونى او كلمه السر خاطئه');
            return Redirect::back();
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
