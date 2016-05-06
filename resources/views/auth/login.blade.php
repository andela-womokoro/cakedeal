@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')
<div class="container" style="min-height: 180px">
  <div class="text-center">
    <h4>Please Login to continue</h4>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
      <a href="/auth/facebook" class="btn btn-block btn-social btn-facebook">
        <span class="fa fa-facebook"></span>
        Login with Facebook
      </a>
      <a href="/auth/google" class="btn btn-block btn-social btn-google">
        <span class="fa fa-google"></span>
        Login with Google
      </a></div>
      <div class="col-md-4"></div>
    </div>
  </div>
</div>
@endsection
