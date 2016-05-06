<?php

namespace CakeDeal\Http\Controllers;

use CakeDeal\Order;
use CakeDeal\Product;
use Illuminate\Http\Request;
use CakeDeal\Http\Requests;

class OrderController extends Controller
{
    public function index($id)
    {
        $order = Product::where('id', $id)->first();

        return view('app.show', compact('order'));
    }

    public function store(Request $request)
    {

    }
}
