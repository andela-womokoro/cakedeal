<?php

namespace CakeDeal\Http\Controllers;

use CakeDeal\Product;
use CakeDeal\Order;
use Illuminate\Http\Request;
use CakeDeal\Http\Requests;

class OrderController extends Controller
{
    public function index($id)
    {
        $order = Product::where('id', $id)->first();

        return view('app.show', compact('order'));
    }
}
