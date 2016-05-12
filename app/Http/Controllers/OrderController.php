<?php

namespace CakeDeal\Http\Controllers;

use Auth;
use Mail;
use CakeDeal\User;
use CakeDeal\Order;
use CakeDeal\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use CakeDeal\Http\Requests;

class OrderController extends Controller
{
    // public function index($id)
    // {
    //     $users = User::all()->take(4);

    //     $order = Product::where('id', $id)->first();

    //     return view('app.show', compact('order', 'users'));
    // }

    public function startOrder($id)
    {
        $product = Product::find($id);

        return view('app.show', ['product' => $product]);
    }

    public function store(Request $request, $id)
    {
        $productOrdered = Product::find($request->input('product_id'));

        // $order = Product::where('id', $id)->first();
        $cakeorder = new Order();
        $cakeorder->user_id = Auth::user()->id;
        // $cakeorder->product_id = Product::find($id)->first()->id;
        $cakeorder->product_id = $productOrdered->id;
        $cakeorder->quantity = $request->input('quantity');
        $cakeorder->message = $request->input('message');
        $cakeorder->status = 'Pending';
        $cakeorder->delivery_date = $request->input('delivery-date');
        $cakeorder->save();

        //send new customer order notification text message to merchant
        $merchantPhoneNo = $productOrdered->user->phone_no;
        $textMessage = "You have a new customer order for \"$productOrdered->name\"! Please log into your cakedeal dashboard to process this order.";
        $response = $this->sendTextMessage($merchantPhoneNo, $textMessage);


        //send order notification email to merchant
        /*
        $url = 'http://www.cakedeal.herokuapp.com/dashboard';
        Mail::send('emails.order', ['url' => $url], function($m) use ($id) {
            $m->from(Auth::user()->email, Auth::user()->username);
            $m->to(Product::find($id)->user->email);
            $m->subject('I love your cake and I want to have a feel');
        });
        */

        // return view('app.show', compact('order'))->with(['message' => 'Your order has been created!']);
        return view('app.show', ['product' => $productOrdered, 'message' => 'Your order was made successfully.']);
    }

    public static function sendTextMessage($recipient, $message)
    {
        $smsURL = "http://www.nigerianbulksms.com/components/com_spc/smsapi.php?username=cakedeal2016&password=cakedeal&sender=CakeDeal&recipient=$recipient&message=$message";

        $client = new Client();
        $smsGatewayResponse = $client->get($smsURL);

        return $smsGatewayResponse;
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

        if($newState == 'Processing') {
            //send order processing notification text message to customer
            $customerPhoneNo = $order->user->phone_no;
            $textMessage = "Your cakedeal order is now being processed. Thanks for using the cakedeal platform.";
            $response = $this->sendTextMessage($customerPhoneNo, $textMessage);
        }

        return view('order_details', [
                        'order' => $order,
                        'message' => 'This order\'s status has now been updated to "'.$newState.'"'
                        ]);
    }

    public function getUserOrders()
    {
        return view('user_orders', ['userOrders' => $this->fetchUserOrders()]);
    }

    public function cancelOrDeleteOrder(Request $request)
    {
        $id = $request->input('id');
        $action = $request->input('submit');
        $message = "";

        $order = Order::find($id);

        if ($action == "cancel") {
            $order->status = 'Canceled';
            $order->save();

            $message = "You have successfully canceled the order.";
        } elseif ($action == "delete") {
            $order->delete();

            $message = "You have successfully deleted the order.";
        }

        return view('user_orders', ['userOrders' => $this->fetchUserOrders(), 'message' => $message]);
    }

    public static function fetchUserOrders()
    {
        $userId = Auth::user()->id;

        //fetch all orders this user made
        $orders = User::find($userId)->orders;

        return $orders;
    }
}
