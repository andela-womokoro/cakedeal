@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover table1">
            	<tr>
            		<th colspan="7"><h2>Pending Customer Orders</h2></th>
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
                        <div class="form-container" style="margin-bottom:0px;">
                            <form method="post" action="/order/view">
                                {{ csrf_field() }}
                                <input type="hidden" name="order_id" value="{{ '3' }}" />
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
            		<th colspan="5"><h2>My Orders</h2></th>
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
    	<div class="col-sm-9">
            
            <!-- Cake order form -->
            <div class="form-container">
            	<h2>Make a Cake Order</h2>
                <form method="post" action="/profile/update">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Quantity" name="quantity" value=""  maxlength="5" required style="width:100px;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Delivery Date" name="delivery_date" value=""  maxlength="5" required>
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
