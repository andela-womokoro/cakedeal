@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br />
        </div>
        <div class="col-md-10">
            <br />
        </div>
    </div>

    <div class="row">
    	<div class="col-sm-9">

    		<!-- Profile update form -->
            <div class="form-container">
            	<h2>Update Your Profile</h2>
                <form method="post" action="/profile/update">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="" maxlength="10" minlength="3" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" name="email" value=""  maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Phone Number" name="phone" value=""  maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value=""  maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value=""  maxlength="45" required>
                    </div>
                    <button type="submit" class="btn btn-default">Save Changes</button>
                </form>
            </div>

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
