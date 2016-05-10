<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use CakeDeal\User;
use CakeDeal\Order;
use CakeDeal\Product;
use CakeDeal\Http\Requests;
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
        // $orders = User::find(Auth::user()->id)->orders;
        $orders = User::find(Auth::user()->id)->orders;

        return view('app.dashboard', ['orders' => $orders]);
    }
}
