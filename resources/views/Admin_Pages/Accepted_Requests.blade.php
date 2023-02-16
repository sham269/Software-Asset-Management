@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Accepted Requests</h1> 
   
    </div>

    <a class="btn btn-outline-primary float-right" href="/admin" role="button">Go Back</a>
    @foreach($Accepted_software as $Accepted)
    <div class="card mt-2">
        <div class="card-header">
          Request: {{$Accepted->id}} by: {{$Accepted->Username}}
        </div>
        <div id="card-body" class="card-body">
          <h5 class="card-title">Software Name: {{$Accepted->Software_Name}}</h5>
          <p class="card-text">Software Reason: {{$Accepted->Software_Reason}} <br> Hello</p>
          <p class="text-footer text-muted"> Request Stage: {{$Accepted->Request_Stage}}<br>
            Request Made: {{$Accepted->created_at}} || Updated at {{$Accepted->updated_at}}
            </p>
          
          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$Accepted->id],'method'=>'PUT']) !!}
          {!! Form::submit('Reject', ['class'=>'btn btn-danger','name'=>'submit[Reject]','value'=>'Reject'])!!}
          {!! Form::submit('In Progress', ['class'=>'btn btn-warning','name'=>'submit[Inprogress]','value'=>'Inprogress'])!!}
          
          
    
          {!! Form::close() !!}
          <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $Accepted->id }}" data-id="{{ $Accepted->id }}">Read More</button>
        </div>
        <div class="modal fade bd-example-modal-lg " id="assignModal{{ $Accepted->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $Accepted->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            
            <div class="modal-content">
              @php 
                      $cost=json_decode($Accepted>cost)[0]
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
                        <td>{{$Accepted->id}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Request Made By</th>
                        <td>{{$Accepted->Username}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Name</th>
                        <td>{{$Accepted>Software_Name}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Version</th>
                        <td>{{$Accepted->Software_Version}}</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">OS</th>
                        <td>{{$Accepted->OS}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost</th>
                        <td>{{$cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost (0 if free)</th>
                        <td>{{$Accepted->Software_Cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost (0 if free)</th>
                        <td>{{$Accepted->Software_Cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Job Code (N/A if free)</th>
                        <td>{{$Accepted>Department_Paying}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Module Code</th>
                        <td>{{$Accepted->Module_Code}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Reason</th>
                        <td>{{$Accepted->Software_Reason}}</td>
                      </tr>
                    </tbody>
                  </table>
                  
            </div>
          </div>
        </div>
      </div>   
    @endforeach
@endsection