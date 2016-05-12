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
			                            &nbsp;
			                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#{{$product->id}}">Delete</button>
			                        </form>
			                        &nbsp;
			                    </div>
			                </div>
			            </div>

			            <!-- Deletion Modal -->
						<div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document" style="width: 500px;">
							    <div class="modal-content">
								    <div class="modal-header">
								    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
								    </div>
							      	<div class="modal-body">
							        	<p>Do you really want to delete "{{$product->name}}" from your available products?</p>
							      	</div>
							      	<div class="modal-footer">
							      		<div class="form-container" style="margin-bottom:0px;">
								        	<form method="post" action="/product/delete">
								        		{{ csrf_field() }}
							                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
							                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
							                    &nbsp;&nbsp;
							                    <button type="submit" class="btn btn-default">Yes</button>
							                </form>
						                </div>
							      	</div>
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