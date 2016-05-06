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
        @endif
        @if( $cakes->isEmpty() )
            <h3>No Cake uploaded yet!</h3>
        @endif
    </div>
</div>
@endsection
