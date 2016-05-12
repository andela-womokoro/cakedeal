<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use Mail;
use CakeDeal\User;
use CakeDeal\Order;
use CakeDeal\Product;
use Illuminate\Http\Request;
use CakeDeal\Http\Requests;

class OrderController extends Controller
{
    public function index($id)
    {
        $users = User::all()->take(4);

        $order = Product::where('id', $id)->first();

        return view('app.show', compact('order', 'users'));
    }

    public function store(Request $request, $id)
    {
        $order = Product::where('id', $id)->first();
        $cakeorder = new Order();
        $cakeorder->user_id = Auth::user()->id;
        $cakeorder->product_id = Product::find($id)->first()->id;
        $cakeorder->quantity = $request->input('quantity');
        $cakeorder->message = $request->input('message');
        $cakeorder->delivery_date = $request->input('delivery-date');

        $cakeorder->save();

        $url = 'http://www.cakedeal.herokuapp.com/dashboard';
        Mail::send('emails.order', ['url' => $url], function($m) use ($id) {
            $m->from(Auth::user()->email, Auth::user()->username);
            $m->to(Product::find($id)->user->email);
            $m->subject('I love your cake and I want to have a feel');
        });

        return view('app.show', compact('order'))->with(['message' => 'Your order has been created!']);
    }

    public function viewOrder($id)
    {
        $users = User::all()->take(4);

        $order = Order::find($id);

        return view('order_details', compact('users', 'order'));
    }

    public function changeOrderStatus(Request $request)
    {
        $id = $request->input('id');
        $newState = $request->input('submit');

        $order = Order::find($id);
        $order->status = $newState;
        $order->save();

        return view('order_details', [
                        'order' => $order,
                        'message' => 'This order\'s status has now been updated to "'.$newState.'"'
                        ]);
    }
}
