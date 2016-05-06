<?php

namespace CakeDeal\Http\Controllers;

use CakeDeal\Product;
use Illuminate\Http\Request;
use CakeDeal\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        $cakes = Product::all();

        return view('landing', compact('cakes'));
    }

    public function dashboard()
    {
        return view('app.dashboard');
    }
}
