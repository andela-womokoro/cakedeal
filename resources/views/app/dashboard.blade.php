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
                        <button type="button" class="btn btn-default center" data-toggle="modal" data-target="#LoginModal">Order Now</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <h3>No cakes yet!</h3>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table1">
            	<tr>
            		<th colspan="7"><h2>Pending Customer Orders</h2></th>
            	</tr>
            	<tr>
            		<th></th>
            		<th>Customer</th>
            		<th>Product</th>
            		<th>Quantity</th>
            		<th>Order Status</th>
            		<th>Order Date</th>
            		<th>Delivery Date</th>
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
            	</tr>
            	@endfor
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table1">
            	<tr>
            		<th colspan="5"><h2>My Orders</h2></th>
            	</tr>
            	<tr>
            		<th></th>
            		<th>Dealer</th>
            		<th>Product</th>
            		<th>Quantity</th>
            		<th>Order Date</th>
            		<th>Delivery Date</th>
            	</tr>
            	@for($i = 1; $i < 6; $i++)
            	<tr>
            		<td>{{ $i.'.' }}</td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            	</tr>
            	@endfor
            </table>
        </div>
    </div>

    <div class="row">
    	<div class="col-sm-9">

            <!-- Cake order form -->
            <div class="form-container">
            	<h2>Make a Cake Order</h2>
                <form method="post" action="/profile/update">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Quantity" name="quantity" value=""  maxlength="5" required style="width:100px;">
                    </div>
                    <div class="form-group">
                    	<textarea rows="50" cols="" class="form-control" placeholder="Message (Optional)" name="message" value=""  maxlength="255"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Place Order</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
