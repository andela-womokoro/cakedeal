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
            <div class="table-responsive">
                <table class="table table-bordered table-hover table1">
                	<thead>
                        <tr>
                    		<th colspan="8"><h2>Customer Orders</h2></th>
                    	</tr>
                    </thead>
                    @if ($userProducts->count() > 0)
                    	<thead>
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
                        <thead>
                        @foreach($userProducts as $product)
                            @foreach($product->orders as $order)
                            	<tbody>
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
                                                <form method="link" action="/order/view/{{ $order->id }}">
                                                    <button type="submit" class="btn btn-default">View</button>
                                                </form>
                                            </div>
                                        </td>
                                	</tr>
                                </tbody>
                            @endforeach
                        @endforeach
                    @else
                        <thead>
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-info" role="alert">
                                        You're currently not selling anything. If you choose to sell products later on this site, your customers' orders will appear here. In the main time, happy shopping!
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <br />
            <div class="table-responsive">
                <table class="table table-bordered table-hover table1">
                	<thead>
                        <tr>
                    		<th colspan="8"><h2>My Orders</h2></th>
                    	</tr>
                    </thead>
                    @if ($userOrders->count() > 0)
                    	<thead>
                            <tr>
                        		<th></th>
                        		<th align="left">Dealer</th>
                        		<th align="left">Product</th>
                        		<th align="left">Quantity</th>
                                <th align="left">Order Status</th>
                        		<th align="left">Order Date</th>
                        		<th align="left">Delivery Date</th>
                        	</tr>
                        </thead>
                        @foreach($userOrders as $order)
                        	<tbody>
                                <tr>
                            		<td>{{ $myOrdersCounter++.'.' }}</td>
                            		<td>{{ $order->product->user->username }}</td>
                            		<td>{{ $order->product->name }}</td>
                            		<td>{{ $order->quantity }}</td>
                            		<td>{{ $order->status }}</td>
                            		<td>{{ $order->created_at }}</td>
                                    <td>{{ $order->delivery_date }}</td>
                            	</tr>
                            </tbody>
                        @endforeach
                    @else
                        <thead>
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-info" role="alert">
                                        It appears you have not made any orders on this site. When you order for products, your orders will appear here. Go ahead and order something delicious!
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
