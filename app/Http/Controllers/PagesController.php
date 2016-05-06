<?php

namespace CakeDeal\Http\Controllers;

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
        $cakes = Product::all();
        return view('app.dashboard', compact('cakes'));
    }
}
