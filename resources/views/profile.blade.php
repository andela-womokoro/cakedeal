@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
    @if(isset($message))
        <div class="row">
            <div class="col-md-12"> 
                <div class="alert alert-info" role="alert">
                    {{ $message }}
                </div>  
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
        	<!-- Profile update form -->
            <div class="form-container">
            	<h2>Update Your Profile</h2>
                <form method="post" action="/profile/update">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $user->username }}" maxlength="10" minlength="3" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ $user->email }}"  maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Phone Number" name="phone" value="{{ $user->phone }}"  maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ $user->first_name }}"  maxlength="45" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}"  maxlength="45" required>
                    </div>
                    <button type="submit" class="btn btn-default">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection