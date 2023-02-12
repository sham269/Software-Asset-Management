@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Accepted Requests</h1>
    </div>
    @foreach($Accepted_software as $Accepted)
    <div class="card mt-2">
        <div class="card-header">
          Request: {{$Accepted->id}} by: {{$Accepted->Username}}
        </div>
        <div id="card-body" class="card-body">
          <h5 class="card-title">Software Name: {{$Accepted->Software_Name}}</h5>
          <p class="card-text">Software Reason: {{$Accepted->Software_Reason}} <br> Hello</p>
          <p class="text-footer text-muted">{{$Accepted->Request_Stage}}</p>
          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$Accepted->id],'method'=>'PUT']) !!}
          {!! Form::submit('In Progress', ['class'=>'btn btn-warning form-control','name'=>'submit[Inprogress]','value'=>'Inprogress'])!!}
         
    {!! Form::close() !!}
        </div>
      </div>   
    @endforeach
@endsection