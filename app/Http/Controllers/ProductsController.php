<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function uploadProduct()
    {
        return view('product_upload');
    }

    public function addProduct()
    {
        return view('sell');
    }
}
