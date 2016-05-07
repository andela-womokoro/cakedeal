<?php

namespace CakeDeal\Http\Controllers;

use CakeDeal\Order;
use CakeDeal\Product;
use Illuminate\Http\Request;
use CakeDeal\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        $cakes = Product::all()->take(3);

        return view('landing', compact('cakes'));
    }

    public function dashboard()
    {
        $order = Order::personal()->get();

        $cakes = Product::personal()->get();


        return view('app.dashboard', compact('cakes', 'order'));
    }


}
