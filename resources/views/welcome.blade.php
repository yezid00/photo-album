<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
	 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<style type="text/css">
		body,html{
			height: 100%;
		}
		body{
			/*background-image: url(storage/image/bg.jpg);*/
			background-color: #01142F;
		 	background-size: cover;
		 	background-repeat: no-repeat; 
		 	background-position: center;"
		}
		.create-acc{
		  color: white;
		  margin-top: 25px;
		  font-size: 30px;
		  font-weight: 50px;
		  text-align: center;
		}
		
	</style>
</head>
<body>
	@include('partials.nav')
	<div class="container btn-gallery">
		<a href="{{ route('galleries.index') }}" class="btn btn-warning btn-lg">Checkout Gallery</a>
	</div>
	@if(!Auth::user())
		<div class="container create-acc">
			<h1>To Create your own Gallery,Please Create an account</h1>
		</div>
	@endif
</body>
</html>