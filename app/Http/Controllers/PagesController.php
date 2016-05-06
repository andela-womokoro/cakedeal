<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use CakeDeal\User;
use CakeDeal\Order;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function dashboard()
    {
    	$userOrders = User::find(Auth::user()->id)->orders;

        return view('app.dashboard', ['userOrders' => $userOrders]);
    }

    public function viewOrder(Request $request)
    {
    	// $orderId = $request->input('order_id');
    	// dd($request->input('order_id'));

        return view('order_details');
    }
}
