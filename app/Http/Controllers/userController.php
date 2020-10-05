<?php

namespace App\Http\Controllers;
use App\Http\Requests\userRequest;
use App\user;

use Illuminate\Http\Request;

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

    public function store(userRequest $request)
    {
        $validated  = $request->validated();

        user::create($validated);
        return redirect('users');
    }

}
