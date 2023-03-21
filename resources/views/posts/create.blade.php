@extends('layouts.app')

@section('content')
   
    <h1 class="text-center">Add Software</h1>

    <a class="btn btn-outline-primary float-right" href="\Admin/Software" role="button">Go Back</a>

    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','method'=>'PUT']) !!}
        <div class="form-group">
            {{Form::label('Software_Name','Software Name')}}
            {{Form::text('Software Name','',['class'=>'form-control','placeholder'=>'Enter Software Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('Software_Information','Software Information')}}
            {{Form::textarea('Software Information','',['class'=>'form-control','placeholder'=>'Enter Software Reason'])}}
        </div>
        <div class="form-group" id="buttons">
            <label><strong>Blacklisted :</strong></label><br>
        <label><input  type="radio" name="blacklisted[]" value="Blacklisted" id="Yes">Yes</label>
        <label><input type="radio" name="blacklisted[]" value="Not-Blacklisted" id="No">No</label>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-success mt-2'])}}
{!! Form::close() !!}
@endsection
