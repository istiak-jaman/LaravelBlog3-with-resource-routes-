@extends('welcome')
@section('content')
	<div class="container">
          <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        

        	<a href="{{route('all.post')}}" class="btn btn-primary">All post</a>
       <hr>

       <div>
         
         	<p>Category Name: {{ $post->name }}</p>
         	<h3>{{$post->title }} </h3>
         	<hr>
         	<img src="{{ URL::to($post->image) }}" height="340px" style="border: 3px solid #ddd;">
         	<p>{{ $post->details }}</p>
         
       </div>
       
      </div>
    </div>
        </div>
@endsection