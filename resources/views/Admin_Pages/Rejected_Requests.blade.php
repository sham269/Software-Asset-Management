@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Rejected Requests</h1>
    </div>
    <a class="btn btn-outline-primary float-right" href="/admin" role="button">Go Back</a>
    @foreach($rejected_software as $rejected)
    <div class="card mt-2">
        <div class="card-header">
          Request: {{$rejected->id}} by: {{$rejected->Username}}
        </div>
        <div id="card-body" class="card-body">
          <h5 class="card-title">Software Name: {{$rejected->Software_Name}}</h5>
          <p class="card-text">Software Reason: {{$rejected->Software_Reason}} <br> Hello</p>
          <p class="text-footer text-muted">{{$rejected->Request_Stage}}</p>
          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$rejected->id],'method'=>'PUT']) !!}
          {!! Form::submit('In Progress', ['class'=>'btn btn-warning','name'=>'submit[Inprogress]','value'=>'Inprogress'])!!}
          {!! Form::submit('Accept', ['class'=>'btn btn-success','name'=>'submit[Accept]','value'=>'Accept'])!!}
          
    
          {!! Form::close() !!}
        </div>
      </div>   
    @endforeach
@endsection