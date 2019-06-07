<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index($user){
        // dd($user);
        //dd(User::find($user));
        $user = User::findOrFail($user);

        return view('profiles.index')->with('user', $user);
    }
}
