@extends('layouts.app')
@section('content')
<h1 class="text-center"> Users </h1>
    <a class="btn btn-outline-primary float-right" href="/admin" role="button">Go Back</a>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Verified</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    @foreach($Users as $user)
    <tbody>
        
      <tr>
        
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->verified}}</td>
        <td>
          @if($user->role=="Admin")
          Actions forbidden
          @elseif(Auth::User()->role=="Admin")
          <button type="button" class="assign-modal btn btn-sm btn-success" data-toggle="modal" data-target="#editDealModal{{ $user->id }}" data-id="{{ $user->id }}">Edit</button>
          @else
            <button type="button" class="assign-modal btn btn-sm btn-success" data-toggle="modal" data-target="#editDealModal{{ $user->id }}" data-id="{{ $user->id }}">Edit</button>
            <button type="button" class="assign-modal btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteModal{{ $user->id }}" data-id="{{ $user->id }}">Delete</button>
        @endif
          </td>
      </tr>
    </tbody>
    <div class="modal fade bd-example-modal-lg " id="editDealModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editDealModal{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          
          <div class="modal-content">

            <h1 class="text-center">Edit form</h1>
            <div class="container">
            {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@UserUpdate',$user->id],'method'=>'PUT']) !!}
            <div class="form-group">
                {{Form::label('name','User Name')}}
                {{Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Enter Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Enter New Email'])}}
            </div>
            <div class="form-group">
              <label>Choose a Role:</label>
          <select class="form-control" name="role" required="required">

              <option value="Admin" {{$user->role == "Admin" ? 'selected':" "}}>Admin</option>
              <option value="Academic" {{$user->role == "Academic" ? 'selected':" "}}>Academic</option>
          
          </select>
          </div>
          <div class="form-group">
            <label>Make Admin (1 for Admin 0 for Normal):</label>
          <select class="form-control" name="is_admin" required="required">
      
            <option value= "0" {{$user->is_admin == "0" ? 'selected':" "}}>0</option>
            <option value= "1" {{$user->is_admin == "1" ? 'selected':" "}}>1</option>
        
        </select>
          
        </div>
           {{Form::submit('Submit', ['class'=>'btn btn-success mt-2 mb-2'])}}
         {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>
       
        <div class="modal fade bd-example-modal-lg " id="DeleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="DeleteModal{{ $user->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            
            <div class="modal-content">
               <h1 class="text-center mt-5"> Confirmation </h1>
               <p class="text-center"> Are you sure you want to delete {{$user->name}}? </p>
               <div class="container text-center">
               <img src="{{asset('build/assets/check-green.gif')}}" style="width: 60px;height:80px" class="card-img-top" >
               </div>
            <div class="container text-center mt-5">
               <button type="button" class="btn btn-small btn-success mb-2 "data-dismiss="modal">
                Cancel
              </button>
              {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@destroy',$user->id],'method'=>'DELETE','class'=>'float-end']) !!}

              {{Form::submit('Delete', ['class'=>'btn btn-danger mb-2'])}}
              {!! Form::close() !!}
            </div>
            </div>
           
          </div>
         
        </div>
     
    @endforeach
   
</table>

     
{{-- @foreach($Users->chunk(4) as $chunk)
<div class="card-group">
    @foreach($chunk as $users)
    <div class="card mt-2">
      <img src="{{asset('build/assets/user.jpg')}}" width="100" height="200" class="card-img-top" >
      <div class="card-body">
        <h5 class="card-title text-center">UserName: {{$users->name}}</h5>
        <p class="card-text text-center">User Email: {{$users->email}}</p>
        <p class="card-text text-center">Role: {{$users->role}}</p>
        <p class="card-text text-center"><small class="text-muted">Created: {{$users->created_at}}</small></p>
      
        {{-- {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$users->id],'method'=>'PUT']) !!}
        {!! Form::submit('Delete', ['class'=>'btn btn-danger','name'=>'submit[Delete]','value'=>'Delete'])!!}
        {!! Form::submit('Edit', ['class'=>'btn btn-warning','name'=>'submit[Edit]','value'=>'Edit'])!!}
      
        
  
        {!! Form::close() !!} --}}
      {{-- </div>
  </div>
  @endforeach --}}
{{-- @endforeach  --}}
@endsection