@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')
<div class="container" style="min-height: 180px">
    <center>
        <div class="form-container">
            <h2>Please Login to continue</h2>
            <div class="row">
                <div class="col-md-12">
                    <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook" style="width:300px;">
                        <span class="fa fa-facebook"></span>Login with Facebook
                    </a>
                    <a href="/auth/google" class="btn btn-block btn-social btn-google" style="width:300px;">
                        <span class="fa fa-google"></span>Login with Google
                    </a>
                </div>
            </div>
        </div>
    </center>
</div>
@endsection
