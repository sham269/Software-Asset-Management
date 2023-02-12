@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>All Requests-Admin Page</p1>
    </div>
    @foreach($softwares as $software)
    <div class="card mt-2">
        <div class="card-header">
          Request: {{$software->id}} by: {{$software->Username}}
        </div>
        <div id="card-body" class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <p class="text-footer text-muted">{{$software->Request_Stage}}</p>
        
        </div>
      </div>   
    @endforeach
@endsection