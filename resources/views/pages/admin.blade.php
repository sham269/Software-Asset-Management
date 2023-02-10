@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    
 
    <h1>Admin Panel</h1>
 
    <div class="row row-cols-1 row-cols-md-4">
      <div class="col mb-3">
        <div class="card bg-light mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 18rem;">
          <div class="card-header">Requests</div>
          <div class="card-body">
            <h5 class="card-title">{{$softwares->count()}}</h5>
            <p class="card-text">Requests made</p>
            <div class="card-footer bg-transparent">
              <a href="Admin/AllRequest" class="btn btn-primary">View all</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-3">
        <div class="card bg-light mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 18rem;">
          <div class="card-header bg-info">Submitted Requests</div>
          <div class="card-body">
            <h5 class="card-title">{{$submitted_software->count()}}</h5>
            <p class="card-text">Requests made</p>
            <div class="card-footer bg-transparent bg-info">
              <a href="#" class="btn btn-info">View all</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-4">
        <div class="card bg-light mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 18rem;">
          <div class="card-header bg-danger text-white">Requests Rejected</div>
          <div class="card-body">
            <h5 class="card-title">{{$rejected_software->count()}}</h5>
            <p class="card-text">Rejected Requests</p>
            <div class="card-footer bg-transparent border-danger">
              <a href="#" class="btn btn-danger">View all</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-3">
        <div class="card card bg-light mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 18rem;">
          <div class="card-header bg-warning ">In Progress Requests</div>
          <div class="card-body">
            <h5 class="card-title">{{$in_Progress->count()}}</h5>
            <p class="card-text">Requests in Progress </p>
            <div class="card-footer bg-transparent border-warning">
              <a href="#" class="btn btn-warning">View all</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col mb-3">
        <div class="card card bg-light mb-3 shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 18rem;">
          <div class="card-header bg-success text-white ">Accepted Requests</div>
          <div class="card-body">
            <h5 class="card-title">{{$accepted_software->count()}}</h5>
            <p class="card-text">Accepted Requests</p>
            <div class="card-footer bg-transparent border-success">
              <a href="#" class="btn btn-success">View all</a>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    {{-- <a href="/posts/create" class="btn btn-info" role="button">Add a Software</a> --}}
</div>
@endsection
