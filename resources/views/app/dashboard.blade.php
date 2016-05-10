@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<?php
    $myOrdersCounter = 1;
    $customerOrdersCounter = 1;
?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table1">
            	<tr>
            		<th colspan="8"><h2>Pending Customer Orders</h2></th>
            	</tr>
            	<tr>
            		<th></th>
            		<th align="left">Customer</th>
            		<th align="left">Product</th>
            		<th align="left">Quantity</th>
            		<th align="left">Order Status</th>
            		<th align="left">Order Date</th>
            		<th align="left">Delivery Date</th>
                    <th align="right"></th>
            	</tr>
                @foreach($userProducts as $product)
                    @foreach($product->orders as $order)
                    	<tr>
                    		<td>{{ $customerOrdersCounter++.'.' }}</td>
                    		<td>{{ $order->user->username }}</td>
                    		<td>{{ $product->name }}</td>
                    		<td>{{ $order->quantity }}</td>
                    		<td>{{ $order->status }}</td>
                    		<td>{{ $order->created_at }}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>
                                <div class="form-container" style="margin:0px;">
                                    <form method="link" action="/order/view/1">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="order_id" value="" />
                                        <button type="submit" class="btn btn-default">View</button>
                                    </form>
                                </div>
                            </td>
                    	</tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table1">
            	<tr>
            		<th colspan="8"><h2>My Orders</h2></th>
            	</tr>
            	<tr>
            		<th></th>
            		<th align="left">Dealer</th>
            		<th align="left">Product</th>
            		<th align="left">Quantity</th>
                    <th align="left">Order Status</th>
            		<th align="left">Order Date</th>
            		<th align="left">Delivery Date</th>
            	</tr>
                @foreach($userOrders as $order)
                	<tr>
                		<td>{{ $myOrdersCounter++.'.' }}</td>
                		<td>{{ $order->product->user->username }}</td>
                		<td>{{ $order->product->name }}</td>
                		<td>{{ $order->quantity }}</td>
                		<td>{{ $order->status }}</td>
                		<td>{{ $order->created_at }}</td>
                        <td>{{ $order->delivery_date }}</td>
                	</tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
