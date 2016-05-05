@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
        </div>
    </div>
</div>

@endsection