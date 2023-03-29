@extends('layouts.app')
@section('content')
<a class="btn btn-primary btn-sm float-left mt-2" href="\posts/create" role="button">Add Software</a>
<h1 class="text-center"> Software Directory List </h1>

<table class="table table-bordered">
    <thead>
      <tr>
    
        <th scope="col">Software Name</th>
        <th scope="col">Software Information </th>
        <th scope="col">Blacklisted?</th>
        <th scope="col">Created at</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($software as $softwares)
      <tr>
        <th scope="row">{{$softwares->id}}</th>
        <td>{{$softwares->Software_Name}}</td>
        <td>{{$softwares->blacklisted}}</td>
        <td>{{$softwares->created_at}}</td>
        <td>
            <button type="button" class="assign-modal btn btn-sm btn-success" data-toggle="modal" data-target="#editDealModal{{ $softwares->id }}" data-id="{{ $softwares->id }}">Edit</button>
            <button type="button" class="assign-modal btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteModal{{ $softwares->id }}" data-id="{{ $softwares->id }}">Delete</button>
        </td>
      </tr>
     
    </tbody>
    <div class="modal fade bd-example-modal-lg " id="editDealModal{{ $softwares->id }}" tabindex="-1" role="dialog" aria-labelledby="editDealModal{{ $softwares->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          
          <div class="modal-content">

            <h1 class="text-center">Edit form</h1>
            <div class="container">
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$softwares->id],'method'=>'PUT']) !!}
            <div class="form-group">
                {{Form::label('Software_Name','Software Name')}}
                {{Form::text('Software Name',$softwares->Software_Name,['class'=>'form-control','placeholder'=>'Enter Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('Software_Information','Software Information')}}
                {{Form::text('Software Information',$softwares->Software_Information,['class'=>'form-control','placeholder'=>'Enter Information'])}}
            </div>
        
          <div class="form-group">
            <label>Blacklisted?</label>
            @php 
                $blacklist=$softwares->blacklisted
                
            @endphp
          
          <select class="form-control" name="blacklisted" required="required">
           
            <option value= "Blacklisted" {{$blacklist == "Blacklisted" ? 'selected':" "}}>Yes</option>
            <option value= "Not-Blacklisted" {{$blacklist == "Not-Blacklisted" ? 'selected':" "}}>No</option>
        
        </select>
          
        </div>
           {{Form::submit('Submit', ['class'=>'btn btn-success mt-2 mb-2'])}}
         {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg " id="DeleteModal{{ $softwares->id }}" tabindex="-1" role="dialog" aria-labelledby="DeleteModal{{ $softwares->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          
          <div class="modal-content">
             <h1 class="text-center mt-5"> Confirmation </h1>
             <p class="text-center"> Are you sure you want to delete this user? </p>
             <div class="container text-center">
             <img src="{{asset('build/assets/check-green.gif')}}" style="width: 60px;height:80px" class="card-img-top" >
             </div>
          <div class="container text-center mt-5">
             <button type="button" class="btn btn-small btn-success "data-dismiss="modal">
              Cancel
            </button>
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$softwares->id],'method'=>'DELETE','class'=>'float-end']) !!}

            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
          </div>
          </div>
         
        </div>
        @endforeach
  </table>
@endsection