<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        
    }
}
