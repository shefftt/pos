<?php

namespace App\Http\Controllers;
use App\Http\Requests\userRequest;
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
        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
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
