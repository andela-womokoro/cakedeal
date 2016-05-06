<?php

namespace CakeDeal\Http\Controllers;

use Illuminate\Http\Request;

use CakeDeal\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function dashboard()
    {
    	// $user = User::find(Auth::user()->id);

        // return view('profile', ['user' => $user]);

        return view('app.dashboard');
    }

    public function viewOrder(Request $request)
    {
    	$request->input('order_id');

        return view('order_details');
    }
}
