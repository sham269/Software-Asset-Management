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
            <p class="text-footer text-muted"> Request Stage: {{$Submitted->Request_Stage}}<br>
              Request Made: {{$Submitted->created_at}} || Updated at {{$Submitted->updated_at}}
           </p>
        
          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$Submitted->id],'method'=>'PUT']) !!}
          {!! Form::submit('Reject', ['class'=>'btn btn-danger','name'=>'submit[Reject]','value'=>'Reject'])!!}
          {!! Form::submit('In Progress', ['class'=>'btn btn-warning','name'=>'submit[Inprogress]','value'=>'Inprogress'])!!}
          {!! Form::submit('Accept', ['class'=>'btn btn-success','name'=>'submit[Accept]','value'=>'Accept'])!!}
          
    
          {!! Form::close() !!}
          <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $Submitted->id }}" data-id="{{ $Submitted->id }}">Read More</button>
        </div>
        <div class="modal fade bd-example-modal-lg " id="assignModal{{ $Submitted->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $Submitted->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            
            <div class="modal-content">
              @php 
                      $cost=json_decode($Submitted->cost)[0]
              @endphp
              <h1 class="text-center text-info"> More information </h1>
               <table>
                <thead>
                  <table class="table text-center">
                    <thead>
                      <tr> 
                        <th scope="col">Field</th>
                        <th scope="col">Response</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Request Id</th>
                        <td>{{$Submitted->id}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Request Made By</th>
                        <td>{{$Submitted->Username}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Name</th>
                        <td>{{$Submitted->Software_Name}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Version</th>
                        <td>{{$Submitted->Software_Version}}</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">OS</th>
                        <td>{{$Submitted->OS}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost</th>
                        <td>{{$cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost (0 if free)</th>
                        <td>{{$Submitted->Software_Cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost (0 if free)</th>
                        <td>{{$Submitted->Software_Cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Job Code (N/A if free)</th>
                        <td>{{$Submitted->Department_Paying}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Module Code</th>
                        <td>{{$Submitted->Module_Code}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Reason</th>
                        <td>{{$Submitted->Software_Reason}}</td>
                      </tr>
                    </tbody>
                  </table>
      
            </div>
          </div>
        </div>
        
    </div>
      @endforeach

@endsection