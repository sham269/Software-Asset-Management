@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->Software_Name}}</h1>
    <div>
        {!!$post->Software_Information!!}
        {{$post->blacklisted}}
    </div>
    @if(Auth::user()->is_admin==1)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-end']) !!}

    {{Form::submit('DELETE', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
@endsection
