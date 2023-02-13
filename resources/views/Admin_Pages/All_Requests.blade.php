@extends('layouts.app')
@section('content')
<div class="container-fluid text-center">
    <h1>All Requests-Admin Page</p1>
    </div>
    <a class="btn btn-outline-primary float-right" href="/admin" role="button">Go Back</a>

    @foreach($softwares as $software)
    <div class="card mt-2">
      
        <div class="card-header">
          Request: {{$software->id}} by: {{$software->Username}}
        </div>
        <div id="card-body" class="card-body">
       
          <h5 class="card-title">Software Name: {{$software->Software_Name}}</h5>
          
          <p class="card-text">Software Reason: {{$software->Software_Reason}}</p>
          <button type="button" class="assign-modal btn btn-sm btn-primary" data-toggle="modal" data-target="#assignModal{{ $software->id }}" data-id="{{ $software->id }}">Read More</button>
          {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Read More</button> --}}
         
          <p class="text-footer text-muted">Request Stage: {{$software->Request_Stage}}</p>
        </div>
  
    
  </div>

  <div class="modal fade bd-example-modal-lg " id="assignModal{{ $software->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $software->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        @php 
                $cost=json_decode($software->cost)[0]
        @endphp
        <h1 class="text-center"> More information </h1>
        <p >Software Version: {{$software->Software_Version}} <br>
        Software OS: {{$software->OS}}<br>
        Software Link: {{$software->Software_Link}} <br>
        Free or Paid?: {{$cost}} <br>
        Software Cost (0 if free): £{{$software->Software_Cost}}<br>
        Job Code (N/A if free): {{$software->Department_Paying}}<br>
        Module Code: {{$software-> Module_Code}}

        </p>
        

      </div>
    </div>
  </div>
    @endforeach
 
        
        </div>  
    {{-- <script>
      $(document).on("click", ".open-ReadMore", function () {
       var myBookId = $(this).data('id');
       $(".modal-body #ReadMore").val( myBookId );
       // As pointed out in comments, 
         // it is unnecessary to have to manually call the modal.
        // $('#addBookDialog').modal('show');
      });
    </script> --}}
@endsection