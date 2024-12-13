<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $users = User::get();
        return view("users.index",compact('users'));
    }

    public function show(User $user){
        return view('users.detail',compact('user'));
    }
}
