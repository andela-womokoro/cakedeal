<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->phone_no = $request->input('phone');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->save();

        return view('profile', ['user' => $user, 'message' => 'Your profile has been successfully updated.']);
    }
}
