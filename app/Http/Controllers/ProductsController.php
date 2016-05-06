<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use Alert;
use Redirect;
use Cloudder;
use Validator;
use CakeDeal\Product;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;
use CakeDeal\ProductCategory;

class ProductsController extends Controller
{
    public function uploadProduct()
    {
        $categories = ProductCategory::all();

        return view('product_upload', compact('categories'));
    }

    public function getProducts()
    {
        $cakes = Product::all();

        return view('app.order', compact('cakes'));
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
        // $validator = Validator::make($request->all(), [
        //     'name'          => 'required|min:1',
        //     'description'   => 'required|min:15',
        //     'price'  => 'required',
        //     'image_url'    => 'required',
        // ]);

        // if ($validator->fails()) {

        //     return Redirect::back()->withInput();
        // }

        $img =  $request->file('image_file');
        Cloudder::upload($img);
        $imgurl = Cloudder::getResult()['url'];

        $cake = new Product();
        $cake->category_id = $request->input('category');
        $cake->user_id = Auth::user()->id;
        $cake->name = $request->input('name');
        $cake->description = $request->input('description');
        $cake->price = $request->input('price');
        $cake->image_url = $imgurl;

        $cake->save();

        return redirect()->to('/dashboard')->with('info', 'Your Project has been created successfully');


    }
}
