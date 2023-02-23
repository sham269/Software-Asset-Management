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
         
          <p class="text-footer text-muted"> Request Stage: {{$software->Request_Stage}}<br>
            Request Made: {{$software->created_at}} || Updated at {{$software->updated_at}}
            </p>
        </div>
  
    
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