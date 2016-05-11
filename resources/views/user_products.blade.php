@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			 <h2 class="heading2">My Products</h2>
			 <center>
				 @if($products->count() > 0)
			        @foreach($products as $product)
			            <div class="featured shadow1">
			                <img src="{{ $product->image_url }}" class="img-responsive photo" border="0" />
			                <div class="featured-footer">
			                    <div class="row centered-heading"><h4>&#8358; {{ $product->price }}</h4></div>
			                    {{ $product->name }}<br />
			                    <div class="form-container" style="padding:0px; margin:5px;">
			                        <form method="link" action="/product/edit/{{ $product->id }}" style="display: inline;">
			                            <button type="submit" class="btn btn-default">Edit</button>
			                        </form>
			                        &nbsp;
			                        <form method="link" action="/product/delete/{{ $product->id }}" style="display: inline;">
			                            <button type="submit" class="btn btn-default">Delete</button>
			                        </form>
			                    </div>
			                </div>
			            </div>
			        @endforeach
		        @else
		            <div class="alert alert-info" role="alert">
                        You currently have no products to display. If you choose to sell products later on this site, your products will appear here.
                    </div>
		        @endif
	        </center>
		</div>
	</div>
</div>

@endsection