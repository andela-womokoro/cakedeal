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
        $users = User::all()->take(4);

        $cakes = Product::all()->take(3);

        return view('landing', compact('cakes', 'users'));
    }

    public function dashboard()
    {
        $users = User::all()->take(4);

        $order = Order::personal()->get();

        $cakes = Product::personal()->get();

        return view('app.dashboard', compact('cakes', 'order', 'users'));
    }
}
