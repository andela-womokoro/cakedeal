@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<?php
    $customerOrdersCounter = 1;
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover table1">
                	<thead>
                        <tr>
                    		<th colspan="9"><h2>Customer Orders</h2></th>
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
                                <th align="left">Order Time</th>
                        		<th align="left">Delivery Date</th>
                                <th align="right"></th>
                        	</tr>
                        <thead>
                        @foreach($userProducts as $product)
                            @foreach($product->orders as $order)
                                @if($order->status != 'Rejected')
                                	<tbody>
                                        <tr>
                                    		<td>{{ $customerOrdersCounter++.'.' }}</td>
                                    		<td>{{ $order->user->username }}</td>
                                    		<td>{{ $product->name }}</td>
                                    		<td>{{ $order->quantity }}</td>
                                    		<td>{{ $order->status }}</td>
                                    		<td>{{ date('D M d, Y', strtotime($order->created_at)) }}</td>
                                            <td>{{ date('h:i A', strtotime($order->created_at)) }}</td>
                                            <td>{{ date('D M d, Y', strtotime($order->delivery_date)) }}</td>
                                            <td>
                                                <div class="form-container" style="margin:0px;">
                                                    <form method="link" action="/order/view/{{ $order->id }}">
                                                        @if($order->status == "Canceled")
                                                            <button type="submit" class="btn btn-default" disabled>View</button>
                                                        @else
                                                            <button type="submit" class="btn btn-default">View</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </td>
                                    	</tr>
                                    </tbody>
                                @endif
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
</div>

@endsection
