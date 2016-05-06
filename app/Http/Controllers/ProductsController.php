<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use Alert;
use Cloudder;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;
use CakeDeal\ProductCategory;

class ProductsController extends Controller
{
    public function uploadProduct()
    {
        $categories = ProductCategory::all();
        return view('product_upload',compact('categories'));
    }

    public function addProduct()
    {
        return view('sell');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required|min:1',
            'description'   => 'required|min:15',
            'technologies'  => 'required',
            'project_url'    => 'required|unique:projects|url',
        ]);
    }
}
