@extends('layouts.app')

@section('content')
    <h1>Add Software</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('Software_Name','Software Name')}}
            {{Form::text('Software Name','',['class'=>'form-control','placeholder'=>'Enter Software Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('Software Reason','Software Information')}}
            {{Form::textarea('Software Information','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter Reason for request'])}}
        </div>
        <div class="form-group" id="buttons">
            <label><strong>Blacklisted :</strong></label><br>
        <label><input  type="radio" name="blacklisted[]" value="Blacklisted" id="Yes">Yes</label>
        <label><input type="radio" name="blacklisted[]" value="Not-Blacklisted" id="No">No</label>
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
{!! Form::close() !!}
@endsection
