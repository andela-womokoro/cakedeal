@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="heading2">All Category Of Cakes</h2>
            <center>
                @if($cakes)
                    @foreach($cakes as $cake)
                        <div class="featured shadow1">
                            <img src="{{ $cake->image_url }}" class="img-responsive photo" border="0" />
                            <div class="featured-footer">
                                <div class="row centered-heading"><h4>&#8358; {{ $cake->price }}</h4></div>
                                {{ $cake->name }}<br />
                                <div class="form-container centered-heading" style="padding:0px; margin:5px;">
                                    <form method="link" action="/product/{{ $cake->id }}">
                                        <button type="submit" class="btn btn-default">Order Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if( $cakes->isEmpty() )
                    <h3>No Cake uploaded yet!</h3>
                @endif
            </center>
        </div>
    </div>
</div>
@endsection
