<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use Alert;
use Cloudder;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;

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
