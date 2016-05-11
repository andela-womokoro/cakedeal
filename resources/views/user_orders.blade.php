@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<?php
    $myOrdersCounter = 1;
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
        	@if(isset($message))
                <div class="row">
                      <div class="col-md-12"> 
                          <div class="alert alert-info" role="alert">
                              {{ $message }}
                          </div>  
                      </div>
                </div>
          	@endif
            <div class="table-responsive">
                <table class="table table-hover table1">
                	<thead>
                        <tr>
                    		<th colspan="9"><h2>My Orders</h2></th>
                    	</tr>
                    </thead>
                    @if ($userOrders->count() > 0)
                    	<thead>
                            <tr>
                        		<th></th>
                        		<th align="left">Merchant</th>
                        		<th align="left">Product</th>
                        		<th align="left">Quantity</th>
                                <th align="left">Order Status</th>
                        		<th align="left">Order Date</th>
                                <th align="left">Order Time</th>
                        		<th align="left">Delivery Date</th>
                                <th></th>
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
                            		<td>{{ date('D M d, Y', strtotime($order->created_at)) }}</td>
                                    <td>{{ date('h:i A', strtotime($order->created_at)) }}</td>
                                    <td>{{ date('D M d, Y', strtotime($order->delivery_date)) }}</td>
                                    <td>
                                        <div class="form-container" style="margin:0px;">
                                            <form method="post" action="/orders/user">
                                            	{{ csrf_field() }}
                                            	<input type="hidden" name="id" value="{{ $order->id }}" />
                                                @if($order->status == "Pending")
                                                    <button type="submit" name="submit" value="cancel" class="btn btn-default">Cancel</button>
                                                @elseif($order->status == "Canceled" || $order->status == "Rejected")
                                                    <button type="submit" name="submit" value="delete" class="btn btn-default">Delete</button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
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