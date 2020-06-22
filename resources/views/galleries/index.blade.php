@extends('layouts.app')

@section('content')
	<div class="container">
			@foreach($galleries as $images)
				<div class="wrapper">
					<div class="wrapper-image">
						<img src="/storage/gallery/{{ $images->image }}">
					</div>
				</div>	
			@endforeach
	</div>
@endsection