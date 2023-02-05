@extends('layouts.app')
@section('content')
<div class="container text-center">

    <h1>{{$PageTitle}}</h1>
</div>
<div class="card-body my-2">
    {!! Form::open(['action' => 'App\Http\Controllers\RequestsController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label('Software_Name','Software Name')}}
        {{Form::text('Software Name','',['class'=>'form-control','placeholder'=>'Enter Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('Software_Link','Software Link')}}
        {{Form::text('Software Link','',['class'=>'form-control','placeholder'=>'Enter Link to software'])}}
    </div>
    <div class="form-group">
        {{Form::label('Software_Version','Software Version')}}
        {{Form::text('Software Version','',['class'=>'form-control','placeholder'=>'Enter Version'])}}
    </div>
    <div class="form-group" id="buttons">
        <label><strong>Software Cost :</strong></label><br>
        <label><input  type="radio" name="cost[]" value="Paid" id="paid" onchange="change()"> Paid</label>
        <label><input type="radio" name="cost[]" value="Free" id="free" onchange="change()"> Free</label>
         <div class="form-group" id="text" style="display: none">
               {{Form::label('Software_Cost','Software Cost')}}
                {{Form::text('Software Cost','0',['class'=>'form-control','placeholder'=>'Enter Cost'])}}
             </div>
         <script>
            function change(){
        
           
                if(document.getElementById('paid').checked) {
                    document.getElementById("text").style.display = "block";
            // document.querySelector("paid").innerHTML+= '<p1>Hello</p1'
            //     <div class="form-group">
            //     {{Form::label('Software_Version','Software Version')}}
            //     {{Form::text('Software Version','',['class'=>'form-control','placeholder'=>'Enter Version'])}}
            // </div>`
               
            
             }
             else if(document.getElementById('free').checked) {
                document.getElementById("text").style.display = "none";

               
            
             }
            
            
            }
           
            

         </script>
{{-- 
            <div class="form-group">
                {{Form::label('Software_Version','Software Version')}}
                {{Form::text('Software Version','',['class'=>'form-control','placeholder'=>'Enter Version'])}}
            </div> --}}
        
      
    </div>  
    <div class="form-group">
        {{Form::label('Software_Reason','Software Reason')}}
        {{-- {{Form::textarea('Software Reason','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter Software Information'])}} --}}
        {{Form::textarea('Software Reason','',['class'=>'form-control','placeholder'=>'Enter Software Information'])}}
    </div>
   

    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
{!! Form::close() !!}
</div>
@endsection
