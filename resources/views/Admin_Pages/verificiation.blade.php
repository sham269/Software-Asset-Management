@extends('layouts.app')
@section('content')
<h1 class="text-center mt-2">Users need to be Verified</h1>
<a class="btn btn-outline-primary float-right mb-2" href="/admin" role="button">Go Back</a>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
    @foreach($verified as $user)
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at}}</td>
        <td> {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@verify',$user->id],'method'=>'PUT']) !!}
            {!! Form::submit('Accept', ['class'=>'btn btn-success btn-sm','name'=>'submit[Accept]','value'=>'Accept'])!!}
            {!! Form::submit('Deny', ['class'=>'btn btn-danger btn-sm','name'=>'submit[Deny]','value'=>'Deny'])!!}
            
      
            {!! Form::close() !!}
        </td>
        
      </tr>
      </tbody>
      @endforeach
  </table>
@endsection