@extends('shared.master')
@section('title', 'Cake Deal')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Product form -->
	            <div class="form-container">
	            	<h2>Post a Cake Sample</h2>
	                <form method="post" action="/product/add" enctype="multipart/form-data">
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
            </div>
         </div>
	</div>

@endsection