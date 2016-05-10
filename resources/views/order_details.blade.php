@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-9">
			<table class="table table-hover table1">
                  	<tr>
                  		<th colspan="8"><h2>Customer Order</h2></th>
                  	</tr>
                  	<tr>
                  		<td>Customer Name</td><td align="right">{{ $order->user->username }}</td>
                  	</tr>
                  	<tr>
                  		<td>Customer Phone</td><td align="right">{{ $order->user->phone }}</td>
                  	</tr>
                  	<tr valign="top">
                  		<td>Product Ordered</td><td align="right">{{ $order->product->name }}</td>
                  	</tr>
                  	<tr>
                  		<td>Quantity</td><td align="right">{{ $order->quantity }}</td>
                  	</tr>
                  	<tr>
                  		<td>Order Status</td><td align="right">{{ $order->status }}</td>
                  	</tr>
                  	<tr>
                  		<td>Order Date</td><td align="right">{{ $order->created_at }}</td>
                  	</tr>
                  	<tr>
                  		<td>Delivery Date</td><td align="right">{{ $order->delivery_date }}</td>
                  	</tr>
                  </table>
                  <!-- order states: Pending, Processing, Completed -->

			<div class="form-container">
			    <form method="post" action="/order/view">
			        <input type="hidden" name="id" value="{{ $order->id }}" />
                          {{ csrf_field() }}
                          <input type="hidden" name="new_state" value="" />
			        <button type="submit" class="btn btn-default">Accept Order</button>&nbsp;&nbsp;
			        <button type="submit" class="btn btn-default">Reject Order</button>&nbsp;&nbsp;
			        <button type="submit" class="btn btn-default">Close Order</button>&nbsp;&nbsp;
			    </form>
			</div>
		</div>
	</div>
</div>

			
@endsection