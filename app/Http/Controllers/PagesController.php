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
        $users = User::all()->take(4);

        $cakes = Product::all()->take(3);

        return view('landing', compact('cakes', 'users'));
    }

    public function dashboard()
    {
        $userId = Auth::user()->id;

        //fetch all of this user's products that were ordered for
        $userProducts = Product::has('orders')->where('user_id', '=', $userId)->get();

        return view('app.dashboard', ['userProducts' => $userProducts]);
    }
}
