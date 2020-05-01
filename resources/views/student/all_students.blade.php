@extends('welcome')
@section('content')
	<div class="container">
          <div class="row">
      <div class="col-lg-10  mx-auto">
        
        	<a href="{{ URL::to('student/create') }}" class="btn btn-danger">Add Student</a>
    
       <hr>

       <table class="table table-responsive">
          <tr>
            <th width="5%">SL</th>
            <th width="20%">Student Name</th>
            <th width="25%">Email</th>
            <th width="20%">Phone No</th>
            <th width="30%">Action</th>
          </tr>
          
            
          

        @foreach($student as $row)
          
          <tr>
            <td>{{$row -> id}}</td>
            <td>{{$row -> name}}</td>
            <td>{{$row -> email}}</td>
            <td>{{$row -> phone}}</td>
            <td>
              <a href="{{ URL::to('student/'.$row -> id .'/edit')}}"class="badge badge-info">Edit</a>

              <form action="{{URL::to('student/'.$row->id)}}" method="post">
                @csrf
                @method('DELETE')
                {{-- <button class="badge badge-danger delete-confirm" style="submit" id="delete">Delete</button> --}}
                <button class="badge badge-danger" style="submit"> Delete</button>

                

              </form>
             {{--  <a href="{{ URL::to('delete/student/'.$row -> id)}}"class="badge badge-danger delete-confirm" id="delete">Delete</a> --}}
              <a class="badge badge-success" href="{{ URL::to('student/'.$row -> id)}}">View</a>
            </td>
          </tr>

        @endforeach
         

       </table>
        
   
        
      </div>
    </div>
        </div>
@endsection

