@extends('layouts.app')
@section('content')
 
    <h1>Add Software</h1>
   
    {!! Form::open(['action' => ['App\Http\Controllers\RequestsController@update',$software->id],'method'=>'PUT']) !!}
        <div class="form-group">
            {{Form::label('Software_Name','Software Name')}}
            {{Form::text('Software Name',$software->Software_Name,['class'=>'form-control','placeholder'=>'Enter Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('Software_Link','Software Link')}}
            {{Form::text('Software Link',$software->Software_Link,['class'=>'form-control','placeholder'=>'Enter Link to software'])}}
        </div>
        <div class="form-group">
            {{Form::label('Software_Version','Software Version')}}
            {{Form::text('Software Version',$software->Software_Version,['class'=>'form-control','placeholder'=>'Enter Version'])}}
        </div>
        <div class="form-group">
            <label>Choose a OS:</label>
        <select class="form-control" name="OS" required="required">
    
            <option value="windows" {{$software->OS == "windows" ? 'selected':" "}}>Windows</option>
            <option value="mac" {{$software->OS == "mac" ? 'selected':" "}}>Mac</option>
            <option value="linux" {{$software->OS == "linux" ? 'selected':" "}}>Linux</option>
        </select>
        </div>
            <label><strong>Software Cost :</strong></label><br>
           
            @php 
                $costtype=json_decode($software->cost)[0]
            @endphp
            <label><input {{$costtype == "Paid" ? "checked" : ""}} type="radio" name="cost[]" value= 'Paid' id="paid" onchange="change()"> Paid</label>
            <label><input {{$costtype == "Free" ? "checked" : ""}} type="radio" name="cost[]" value='Free' id="free" onchange="change()"> Free</label>
            <div class="form-group" id="text" style="display: none">
                {{Form::label('Software_Cost','Software Cost')}}
                 {{Form::text('Software Cost',$software->Software_Cost,['class'=>'form-control','placeholder'=>'Enter Cost'])}}
              </div>
              <div class="form-group" id="text2" style="display: none">
                {{Form::label('Department_Paying','Job Code')}}
                 {{Form::text('Department Paying',$software->Department_Paying,['class'=>'form-control','placeholder'=>'Enter the Job Code'])}}
              </div>
        <div class="form-group">
            {{-- @if ({{$software->cost}})
            checked
        @endif
        --}}
        <script>
        function change(){
        
           
            if(document.getElementById('paid').checked) {
                document.getElementById("text").style.display = "block";
                document.getElementById("text2").style.display = "block";
      

           
        
         }
         else if(document.getElementById('free').checked) {
            document.getElementById("text").style.display = "none";
            document.getElementById("text2").style.display = "none";
           
        
         }
        }
         </script>
          
        </div>  
        <div class="form-group">
            {{Form::label('Module_Code','Module Code')}}
            {{Form::text('Module Code',$software->Module_Code,['class'=>'form-control','placeholder'=>'Enter Module Code'])}}
        </div>
        <div class="form-group">
            {{Form::label('Software_Reason','Software_Reason')}}
            {{Form::textarea('Software_Reason',$software->Software_Reason,['class'=>'form-control','placeholder'=>'Enter Software Reason'])}}
        </div>

       {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
{!! Form::close() !!}

@endsection

