@extends('welcome')
@section('content')
	<div class="container">
          <div class="row">
      <div class="col-lg-12  mx-auto">
        	<a href="{{route('write.post')}}" class="btn btn-info">Write Post</a>
       <hr>

       <table class="table table-responsive">
          <tr>
            <th width="5%">SL</th>
            <th width="10%">Category</th>
            <th width="35%">Title </th>
            <th width="25%">Image</th>
            <th width="25%">Action</th>
          </tr>
          
            
          

        @foreach($post as $row)
          
          <tr>
            <td>{{$row -> id}}</td>
            <td>{{$row -> name}}</td>
            <td>{{$row -> title}}</td>
            <td><img src="{{ URL::to($row->image) }} " style="height:60px; width: 100px;"></td>
            <td>
              <a href="{{ URL::to('edit/post/'.$row -> id)}}"class="badge badge-info">Edit</a>
              <a href="{{ URL::to('delete/post/'.$row -> id)}}"class="badge badge-danger delete-confirm" id="delete">Delete</a>
              <a href="{{ URL::to('view/post/'.$row -> id)}}"class="badge badge-success">View</a>
            </td>
          </tr>

        @endforeach
         

       </table>
        
   
        
      </div>
    </div>
        </div>
@endsection

