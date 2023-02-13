@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Submitted Requests</h1> 
   
    </div>
    
    <a class="btn btn-outline-primary float-right" href="/admin" role="button">Go Back</a>
    @foreach($Submitted_software as $Submitted)
    <div class="card mt-2">
        <div class="card-header">
          Request: {{$Submitted->id}} by: {{$Submitted->Username}}
        </div>
        
        <div id="card-body" class="card-body">
          <h5 class="card-title">Software Name: {{$Submitted->Software_Name}}</h5>
          <p class="card-text">Software Reason: {{$Submitted->Software_Reason}} 
          <p class="text-footer text-muted">{{$Submitted->Request_Stage}}</p>
          <div class="container"
        
          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$Submitted->id],'method'=>'PUT']) !!}
          {!! Form::submit('Reject', ['class'=>'btn btn-danger','name'=>'submit[Reject]','value'=>'Reject'])!!}
          {!! Form::submit('In Progress', ['class'=>'btn btn-warning','name'=>'submit[Inprogress]','value'=>'Inprogress'])!!}
          {!! Form::submit('Accept', ['class'=>'btn btn-success','name'=>'submit[Accept]','value'=>'Accept'])!!}
          
    
          {!! Form::close() !!}
          </div>
        </div>
      
      </div>   
      
      </div
      @endforeach

@endsection