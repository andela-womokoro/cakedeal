<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use CakeDeal\User;
use CakeDeal\Order;
use CakeDeal\Product;
use CakeDeal\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $cakes = Product::all()->take(3);

        return view('landing', compact('cakes'));
    }

    public function dashboard()
    {
        $userId = Auth::user()->id;

        //fetch all orders this user made
        $userOrders = User::find($userId)->orders;

        //fetch all of this user's products that were ordered for
        $userProducts = Product::has('orders')->where('user_id', '=', $userId)->get();

        return view('app.dashboard', ['userOrders' => $userOrders, 'userProducts' => $userProducts]);
    }
}
