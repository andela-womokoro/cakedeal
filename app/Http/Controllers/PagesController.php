<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use CakeDeal\User;
use CakeDeal\Order;
use CakeDeal\Product;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $cakes = Product::all()->take(3);

        return view('landing', compact('cakes'));
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

        // return view('order_details');

        $cakes = Product::all();
        return view('app.dashboard', compact('cakes'));
    }
}
