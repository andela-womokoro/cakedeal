<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use CakeDeal\User;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        $users = User::all()->take(4);

        $user = User::find(Auth::user()->id);

        return view('profile', compact('users', 'user'));
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
