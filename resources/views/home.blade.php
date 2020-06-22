@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="{{ route('galleries.create') }}" class="btn btn-primary btn-lg btn-upload">Upload Picture</a>
        <br>
        <br>
        <hr>
        @foreach($gallery as $gallery)
          <div class="wrapper">
            <div class="wrapper-image">
                <img src="/storage/gallery/{{ $gallery->image }}">
            </div>
            <div class="btn-del">
              {{ Form::open(['action'=>['GalleryController@destroy',$gallery->id],'method'=>'DELETE']) }}
                {{ form::submit('delete',['class'=>'btn btn-danger btn-sm']) }}
              {{ form::close() }}
            </div>
            
          </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
