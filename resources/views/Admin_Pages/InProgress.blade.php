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
          <p class="text-footer text-muted"> Request Stage: {{$InProgress->Request_Stage}}<br>
          Request Made: {{$InProgress->created_at}} || Updated at {{$InProgress->updated_at}}
          </p>

          {!! Form::open(['action' => ['App\Http\Controllers\AdminCOntroller@update',$InProgress->id],'method'=>'PUT']) !!}
        
          {!! Form::submit('Accept', ['class'=>'btn btn-success','name'=>'submit[Accept]','value'=>'Accept'])!!}
          {!! Form::submit('Reject', ['class'=>'btn btn-danger','name'=>'submit[Reject]','value'=>'Reject'])!!}
          
    
          {!! Form::close() !!}
        
          <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $InProgress->id }}" data-id="{{ $InProgress->id }}">Read More</button>
          
        </div>
        <div class="modal fade bd-example-modal-lg " id="assignModal{{ $InProgress->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $InProgress->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            
            <div class="modal-content">
              @php 
                      $cost=json_decode($InProgress->cost)[0]
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
                        <td>{{$InProgress->id}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Request Made By</th>
                        <td>{{$InProgress->Username}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Name</th>
                        <td>{{$InProgress->Software_Name}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Version</th>
                        <td>{{$InProgress->Software_Version}}</td>
                        
                      </tr>
                      <tr>
                        <th scope="row">OS</th>
                        <td>{{$InProgress->OS}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost</th>
                        <td>{{$cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost (0 if free)</th>
                        <td>{{$InProgress->Software_Cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Cost (0 if free)</th>
                        <td>{{$InProgress->Software_Cost}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Job Code (N/A if free)</th>
                        <td>{{$InProgress->Department_Paying}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Module Code</th>
                        <td>{{$InProgress->Module_Code}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Software Reason</th>
                        <td>{{$InProgress->Software_Reason}}</td>
                      </tr>
                    </tbody>
                  </table>
      
            </div>
          </div>
        </div>
      </div>   
    @endforeach
@endsection