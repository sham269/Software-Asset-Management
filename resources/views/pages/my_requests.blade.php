@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>Requests</h1>
   
 
    {{-- @foreach ($softwares as $software) --}}
   
      {{-- <div class="row">
        <div class="col-sm-6 my-2 mx-auto">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Software Name: {{$software->Software_Name}} </h5>
              <p class="card-text">Software Reason {{$software->Software_Reason}}</p>
              <p class="card-text">Software Cost {{json_decode($software->cost)[0]}}</p>
              @if($software->Request_Stage == "Submitted")
              <p class="card-text text-success">Software Stage: {{$software->Request_Stage}}</p> --}}
              {{-- <a href="/edit_php/{{$software->id}}" class="btn btn-primary">Edit</a> --}}
              {{-- <a href="/pages/delete_request.blade.php" class="btn btn-secondary">Remove</a> --}}
              {{-- <div class="container">
              {!! Form::open(['action' => ['App\Http\Controllers\RequestsController@destroy',$software->id],'method'=>'DELETE','class'=>'float-mid']) !!}
              <a href="/edit_php/{{$software->id}}" class="btn btn-primary">Edit</a>
              {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
              {!! Form::close() !!}
              </div>
              @elseif($software->Request_Stage == "Rejected")
              <p class="card-footer text-danger">Software Stage: {{$software->Request_Stage}}</p>
              @endif
              
            </div>
          </div>
        </div> --}}
      
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
        @foreach($softwares->chunk(3) as $chunk)

      
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
                  </div>
                  
                </div>
                @endforeach
              </div>
             
             
            
        
      
          
          @endforeach
        
      </div>
      <div class="tab-pane" id="tabs-2" role="tabpanel">
        <p>Second Panel</p>
      </div>
      <div class="tab-pane" id="tabs-3" role="tabpanel">
        <p>Third Panel</p>
      </div>
      <div class="tab-pane" id="tabs-4" role="tabpanel">
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
            </div>
            
          </div>
          @endforeach
        </div>
       
       
      
  

    
    @endforeach
    </div>
    {{-- @endforeach --}}
  
</div>
@endsection