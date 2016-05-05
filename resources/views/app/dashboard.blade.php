@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table1">
            	<tr>
            		<th colspan="5"><h2>Pending Customer Orders</h2></th>
            	</tr>
            	<tr>
            		<th></th>
            		<th>Customer</th>
            		<th>Product</th>
            		<th>Quantity</th>
            		<th>Order Date</th>
            	</tr>
            	@for($i = 1; $i < 6; $i++)
            	<tr>
            		<td>{{ $i.'.' }}</td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            	</tr>
            	@endfor
            </table>
        </div>
        <div class="col-md-10">
            <br />
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
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
            	</tr>
            	@for($i = 1; $i < 6; $i++)
            	<tr>
            		<td>{{ $i.'.' }}</td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            		<td><br /></td>
            	</tr>
            	@endfor
            </table>
        </div>
        <div class="col-md-10">
            <br />
        </div>
    </div>

    <div class="row">
    	<div class="col-sm-9">
            <!-- Product form -->
            <div class="form-container">
            	<h2>Post a Cake Sample</h2>
                <form method="post" action="/profile/update" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cake Name" name="name" value="" maxlength="45" minlength="3" required>
                    </div>
                    <div class="form-group">
                    	<textarea rows="50" cols="" class="form-control" placeholder="Description (Optional)" name="description" value=""  maxlength="255"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Price (e.g. 1200.95)" name="price" value=""  maxlength="5" required style="width:150px;">
                    </div>
                    <div class="form-group">
                        <input type="file" name="image_file" required style="background-color: #fff;" />
                    </div>
                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            </div>

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
