@extends('welcome')
@section('content')
	<div class="container">
          <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        	<a href="{{ URL::to('student')}} " class="btn btn-info">All Student</a>
       <hr>
       <br>
       <h3>Insert New Student</h3>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif
   
        <form action="{{ URL::to('student')}}" method="post" >

          @csrf

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" placeholder="Student name" name="name"  >
              
            </div>
          </div>
<br>
        
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="email" class="form-control" placeholder="Student Email" name="email"  >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="number" class="form-control" placeholder="Phone NO" name="phone"  >
              
            </div>
          </div>

         
          
          <br>
  
          <div class="form-group">
            <button type="submit" class="btn btn-info" >Submit</button>
          </div>
        </form>
      </div>
    </div>
        </div>
@endsection