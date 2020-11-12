<?php

namespace App\Http\Controllers;
use App\Http\Requests\userRequest;
use App\Model\stock;
use App\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function index()
    {
        $users =  user::paginate(10);
        return view('users.index', compact('users'));
    }


    public function create()
    {

        $users =  user::all();
        $stocks = stock::all();
        return view('users.create', compact('users','stocks'));
    }

    public function store(userRequest $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->stock_id = $request->stock_id;

        $users->password = Hash::make($request['password']);

        $users->save();


        return redirect('users');
    }

    public function cancel($id)
    {
        $user = user::find($id);
        $user->status  = 0;


        $user->save();
        return redirect('users');
    }

    public function activate($id)
    {
        $user = user::find($id);
        $user->status  = 1;


        $user->save();
        return redirect('users');
    }

}
