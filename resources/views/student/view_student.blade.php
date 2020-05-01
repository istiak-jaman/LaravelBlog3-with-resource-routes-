@extends('welcome')
@section('content')
	<div class="container">
          <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        

        	<a href="{{URL::to('student')}}" class="btn btn-primary">All Student</a>
       <hr>

       <div>
         

          <table class="table table-responsive">

            <tr class="table-secondary">
              <td><b>Student Name:</b></td>
              <td>{{ $student->name }}</td>
            </tr>
            <tr class="table-success">
              <td ><b>Student Email:</b></td>
              <td>{{ $student->email }}</td>
            </tr>
            <tr class="table-danger">
              <td><b>Contact No:</b></td>
              <td>{{ $student->phone }}</td>
            </tr>
            
          </table>
         	
         
       </div>
       
      </div>
    </div>
        </div>
@endsection