@extends('layouts.app')
@section('content')
    <h1>Add Software</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$post->id],'method'=>'PUT']) !!}
        <div class="form-group">
            {{Form::label('Software_Name','Software Name')}}
            {{Form::text('Software Name',$post->Software_Name,['class'=>'form-control','placeholder'=>'Enter Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('Software_Information','Software Information')}}
            {{Form::textarea('Software Information',$post->Software_Information,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter Software Information'])}}
        </div>

       {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
{!! Form::close() !!}
@endsection
