@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Requests</h1>
   
 
   
      
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Submitted</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">In Progress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Accepted</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Rejected</a>
      </li>
    </ul><!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="tabs-1" role="tabpanel">
        @if(count($softwares)>0)
        @foreach($softwares->chunk(3) as $chunk)

      
              <div class="card-group">
                @foreach($chunk as $software)
             
                <div class="card border-success my-2" style="width: 18rem;">
                  <div class="card-header bg-transparent border-success">Software Name: {{$software->Software_Name}}</div>
                  <div class="card-body text-success">
                    
                    <h5 class="card-title">Software Version: {{$software->Software_Version}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Module Code: {{$software->Module_Code}}</h6>
                    <p class="card-text">{{$software->Software_Reason}}</p>
                    
                    <div class="container">
                      {!! Form::open(['action' => ['App\Http\Controllers\RequestsController@destroy',$software->id],'method'=>'DELETE','class'=>'float-mid']) !!}
                      <a href="/edit_php/{{$software->id}}" class="btn btn-primary">Edit</a>
                      {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                      {!! Form::close() !!}
                    
                      </div>
                      <div class="card-footer bg-transparent text-muted">Request Stage: {{$software->Request_Stage}}</div>
                      <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $software->id }}" data-id="{{ $software->id }}">Read More</button>
                  </div>
                  <div class="modal fade bd-example-modal-lg " id="assignModal{{ $software->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $software->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        @php 
                                $cost=json_decode($software->cost)[0]
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
                                   <td>{{$software->id}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Request Made By</th>
                                   <td>{{$software->Username}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Software Name</th>
                                   <td>{{$software->Software_Name}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Software Version</th>
                                   <td>{{$software->Software_Version}}</td>
                                   
                                 </tr>
                                 <tr>
                                   <th scope="row">OS</th>
                                   <td>{{$software->OS}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Software Cost</th>
                                   <td>{{$cost}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Software Cost (0 if free)</th>
                                   <td>{{$software->Software_Cost}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Software Cost (0 if free)</th>
                                   <td>{{$software->Software_Cost}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Job Code (N/A if free)</th>
                                   <td>{{$software->Department_Paying}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Module Code</th>
                                   <td>{{$software->Module_Code}}</td>
                                 </tr>
                                 <tr>
                                   <th scope="row">Software Reason</th>
                                   <td>{{$software->Software_Reason}}</td>
                                 </tr>
                               </tbody>
                             </table>
                        
                
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
             
             
            
        
      
          
          @endforeach
          @else
        <h1> No Requests in Submitted Queue </h1>
        
    @endif
      </div>
      <div class="tab-pane" id="tabs-2" role="tabpanel">
        @if(count($In_Progress)>0)
        @foreach($In_Progress->chunk(3) as $chunk)

    
        <div class="card-group">
          @foreach($chunk as $software)
       
          <div class="card border-success my-2" style="width: 18rem;">
            <div class="card-header bg-transparent border-success">Software Name: {{$software->Software_Name}}</div>
            <div class="card-body text-success">
              
              <h5 class="card-title">Software Version: {{$software->Software_Version}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$software->Request_Stage}}</h6>
              <p class="card-text">{{$software->Software_Reason}}</p>
             
              <div class="container">
                {!! Form::open(['action' => ['App\Http\Controllers\RequestsController@destroy',$software->id],'method'=>'DELETE','class'=>'float-mid']) !!}
                <a href="/edit_php/{{$software->id}}" class="btn btn-primary">Edit</a>
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
               
                </div>
                <div class="card-footer bg-transparent text-muted">Request Stage: {{$software->Request_Stage}}</div>
                <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $software->id }}" data-id="{{ $software->id }}">Read More</button>
                <div class="modal fade bd-example-modal-lg " id="assignModal{{ $software->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $software->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      @php 
                              $cost=json_decode($software->cost)[0]
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
                                 <td>{{$software->id}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Request Made By</th>
                                 <td>{{$software->Username}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Software Name</th>
                                 <td>{{$software->Software_Name}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Software Version</th>
                                 <td>{{$software->Software_Version}}</td>
                                 
                               </tr>
                               <tr>
                                 <th scope="row">OS</th>
                                 <td>{{$software->OS}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Software Cost</th>
                                 <td>{{$cost}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Software Cost (0 if free)</th>
                                 <td>{{$software->Software_Cost}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Software Cost (0 if free)</th>
                                 <td>{{$software->Software_Cost}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Job Code (N/A if free)</th>
                                 <td>{{$software->Department_Paying}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Module Code</th>
                                 <td>{{$software->Module_Code}}</td>
                               </tr>
                               <tr>
                                 <th scope="row">Software Reason</th>
                                 <td>{{$software->Software_Reason}}</td>
                               </tr>
                             </tbody>
                           </table>
                      
              
                    </div>
                  </div>
            </div>
            </div>
          
          @endforeach
          
         
        </div>
        
    @endforeach
    @else
        <h1> No Requests in progress </h1>
        
    @endif
      </div>
      <div class="tab-pane" id="tabs-3" role="tabpanel">
        @if(count($Accepted_software)>0)
        @foreach($Accepted_software->chunk(3) as $chunk)

      
        <div class="card-group">
          @foreach($chunk as $software)
       
          <div class="card border-success my-2" style="width: 18rem;">
            <div class="card-header bg-transparent border-success">Software Name: {{$software->Software_Name}}</div>
            <div class="card-body text-success">
              
              <h5 class="card-title">Software Version: {{$software->Software_Version}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$software->Request_Stage}}</h6>
              <p class="card-text">{{$software->Software_Reason}}</p>
             
              <div class="container">
                {!! Form::open(['action' => ['App\Http\Controllers\RequestsController@destroy',$software->id],'method'=>'DELETE','class'=>'float-mid']) !!}
                <a href="/edit_php/{{$software->id}}" class="btn btn-primary">Edit</a>
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
                </div>
                <div class="card-footer bg-transparent text-muted">Request Stage: {{$software->Request_Stage}}</div>
                <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $software->id }}" data-id="{{ $software->id }}">Read More</button>
              </div>
            <div class="modal fade bd-example-modal-lg " id="assignModal{{ $software->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $software->id }}" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  @php 
                          $cost=json_decode($software->cost)[0]
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
                             <td>{{$software->id}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Request Made By</th>
                             <td>{{$software->Username}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Software Name</th>
                             <td>{{$software->Software_Name}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Software Version</th>
                             <td>{{$software->Software_Version}}</td>
                             
                           </tr>
                           <tr>
                             <th scope="row">OS</th>
                             <td>{{$software->OS}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Software Cost</th>
                             <td>{{$cost}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Software Cost (0 if free)</th>
                             <td>{{$software->Software_Cost}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Software Cost (0 if free)</th>
                             <td>{{$software->Software_Cost}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Job Code (N/A if free)</th>
                             <td>{{$software->Department_Paying}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Module Code</th>
                             <td>{{$software->Module_Code}}</td>
                           </tr>
                           <tr>
                             <th scope="row">Software Reason</th>
                             <td>{{$software->Software_Reason}}</td>
                           </tr>
                         </tbody>
                       </table>
                  
          
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    @endforeach
    @else
    <h1> No Requests have been Accepted </h1>
    
  @endif
      </div>
      <div class="tab-pane" id="tabs-4" role="tabpanel">
        @if(count($rejected_software)>0)
        @foreach($rejected_software->chunk(3) as $chunk)
        <div class="card-group">
          @foreach($chunk as $software)
       
          <div class="card border-danger my-2" style="width: 18rem;">
            <div class="card-header bg-transparent border-danger">Software Name: {{$software->Software_Name}}</div>
            <div class="card-body text-danger">
              
              <h5 class="card-title">Software Version: {{$software->Software_Version}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$software->Request_Stage}}</h6>
              <p class="card-text">{{$software->Software_Reason}}</p>
             
              <div class="container">
                {!! Form::open(['action' => ['App\Http\Controllers\RequestsController@destroy',$software->id],'method'=>'DELETE','class'=>'float-mid']) !!}
                <a href="/edit_php/{{$software->id}}" class="btn btn-primary">Edit</a>
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}

                </div>
                <div class="card-footer bg-transparent text-muted">Request Stage: {{$software->Request_Stage}}</div>
                
                <button type="button" class="assign-modal btn btn-sm btn-primary float-end" data-toggle="modal" data-target="#assignModal{{ $software->id }}" data-id="{{ $software->id }}">Read More</button>

            </div>
              <div class="modal fade bd-example-modal-lg " id="assignModal{{ $software->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $software->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        @php 
                $cost=json_decode($software->cost)[0]
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
                   <td>{{$software->id}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Request Made By</th>
                   <td>{{$software->Username}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Software Name</th>
                   <td>{{$software->Software_Name}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Software Version</th>
                   <td>{{$software->Software_Version}}</td>
                   
                 </tr>
                 <tr>
                   <th scope="row">OS</th>
                   <td>{{$software->OS}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Software Cost</th>
                   <td>{{$cost}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Software Cost (0 if free)</th>
                   <td>{{$software->Software_Cost}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Software Cost (0 if free)</th>
                   <td>{{$software->Software_Cost}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Job Code (N/A if free)</th>
                   <td>{{$software->Department_Paying}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Module Code</th>
                   <td>{{$software->Module_Code}}</td>
                 </tr>
                 <tr>
                   <th scope="row">Software Reason</th>
                   <td>{{$software->Software_Reason}}</td>
                 </tr>
               </tbody>
             </table>
        

      </div>
    </div>
          </div>
          @endforeach
        </div>
       
       
      
  

    
    @endforeach
    @else
    <h1> No Requests have been Rejected </h1>
    
@endif
    </div>
    {{-- @endforeach --}}
  
</div>
@endsection