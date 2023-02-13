@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>In Progress Requests</h1>
    </div>
    <a class="btn btn-outline-primary float-right" href="/admin" role="button">Go Back</a>
    @foreach($In_Progress_software as $InProgress)
    <div class="card mt-2">
        <div class="card-header">
          Request: {{$InProgress->id}} by: {{$InProgress->Username}}
        </div>
        <div id="card-body" class="card-body">
          <h5 class="card-title">Software Name: {{$InProgress->Software_Name}}</h5>
          <p class="card-text">Software Reason: {{$InProgress->Software_Reason}} <br> Hello</p>
          <p class="text-footer text-muted">{{$InProgress->Request_Stage}}</p>
          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$InProgress->id],'method'=>'PUT']) !!}
        
          {!! Form::submit('Accept', ['class'=>'btn btn-success','name'=>'submit[Accept]','value'=>'Accept'])!!}
          {!! Form::submit('Reject', ['class'=>'btn btn-danger','name'=>'submit[Reject]','value'=>'Reject'])!!}
          
    
          {!! Form::close() !!}
        </div>
      </div>   
    @endforeach
@endsection