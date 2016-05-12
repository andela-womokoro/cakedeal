<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use Alert;
use Redirect;
use Cloudder;
use Validator;
use CakeDeal\User;
use CakeDeal\Product;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;
use CakeDeal\ProductCategory;

class ProductsController extends Controller
{
    public function uploadProduct()
    {
        $users = User::all()->take(4);

        $categories = ProductCategory::all();

        return view('product_upload', compact('categories', 'users'));
    }

    public function getProducts()
    {
        $users = User::all()->take(4);

        $cakes = Product::all();

        return view('app.order', compact('cakes', 'users'));
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

    public function userProducts()
    {
        $users = User::all()->take(4);

        $products = User::find(Auth::user()->id)->products;

        return view('user_products', compact('users', 'products'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $productCategories = ProductCategory::all();

        return view('product_edit', ['product' => $product, 'categories' => $productCategories]);
    }

    public function postEditProduct(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        $product->category_id = $request->input('category');
        $product->user_id = Auth::user()->id;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if (! is_null($request->file('image_file'))) {
            Cloudder::upload($request->file('image_file'));
            $product->image_url = Cloudder::getResult()['url'];
        }

        $product->save();

        $productCategories = ProductCategory::all();

        return view('product_edit', [
                'product' => $product, 
                'categories' => $productCategories, 
                'message' => 'This product\'s information has been successfully updated.'
                ]);
    }
}
