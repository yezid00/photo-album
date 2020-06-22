@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Add picture to gallery</h1>
		<div class="col-md-10">
			<form method="POST" action="{{ action('GalleryController@store') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="image">Add Picture</label>
					<input type="file" name="image" class="form-control" >
				</div>
				<button class="btn btn-primary btn-lg">Upload</button>
			</form>
		</div>	
	</div>
@endsection