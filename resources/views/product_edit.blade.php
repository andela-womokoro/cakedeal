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
			 <h2 class="heading2">Edit Product</h2>
			 <div class="form-container">
                <form method="post" action="/product/edit" enctype="multipart/form-data">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                	<input type="hidden" name="product_id" value="{{ $product->id }}">
                	<div class="form-group">
                		<img src="{{ $product->image_url}}" style="width:250px; border:2px double #f7f7f0" />
                	</div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Cake Name" name="name" value="{{$product->name}}" maxlength="45" minlength="3" required>
                    </div>
                    <div class="form-group">
                    	<textarea rows="50" cols="" class="form-control" placeholder="Description (Optional)" name="description" value=""  minlength="15" maxlength="255">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
					  	<select class="form-control" placeholder="Cake Category" name="category" style="background: #F0F0E9; width: 170px;">
						  	@foreach($categories as $category)
						  		@if($product->category->category == $category->category)
						  			<option value="{{$category->id}}" selected>{{$category->category}} Cake</option>
						  		@else
						  			<option value="{{$category->id}}">{{$category->category}} Cake</option>
						  		@endif
						   	@endforeach
						</select>
					</div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Price (e.g. 1200.95)" name="price" value="{{$product->price}}"  maxlength="8" required style="width:150px;">
                    </div>
                    <div class="form-group">
                    	<p>If you wish to change the product's current image (shown above) please specify the location of the new image's file.</p>
                        <input type="file" name="image_file" style="background-color: #fff;" />
                    </div>
                    <button type="submit" class="btn btn-default">Save Changes</button>
                </form>
            </div>
		</div>
	</div>
</div>

@endsection