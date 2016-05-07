@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
    <div class="row">
        <h2>My Cakes</h2>
        @if($cakes)
        @foreach($cakes as $cake)
        <div class="col-md-4 featured shadow1 centered-heading">
            <img src="{{ $cake->image_url }}" class="img-responsive photo" border="0" />
            <div class="featured-footer">
                <div class="row"><h4>&#8358; {{ $cake->price }}</h4></div>
                {{ $cake->name }}<br />
                <div class="form-container centered-heading" style="padding:0px; margin:5px;">
                    <form method="post">
                        <a href="/product/{{ $cake->id }}" type="button" class="btn btn-default center">Order Now</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        @if( $cakes->isEmpty() )
            <h3>No Cake uploaded yet!</h3>
        @endif
    </div>
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
            	@for($i = 1; $i < 6; $i++)
            	<tr>
            		<td>{{ $i.'.' }}</td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
                    <td>
                        <div class="form-container" style="margin:0px;">
                            <form method="post" action="/order/view">
                                {{ csrf_field() }}
                                <input type="hidden" name="order_id" value="{{ $i }}" />
                                <button type="submit" class="btn btn-default">View</button>
                            </form>
                        </div>
                    </td>
            	</tr>
            	@endfor
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
            	@foreach ($userOrders as $order)
                	<tr>
                		<td><br /></td>
                		<td><br /></td>
                		<td><br /></td>
                		<td>{{ $order->quantity }}</td>
                		<td><br /></td>
                		<td>{{ $order->created_at }}</td>
                        <td><br /></td>
                	</tr>
            	@endforeach
            </table>
        </div>
    </div>
</div>

@endsection
