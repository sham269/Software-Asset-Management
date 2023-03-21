@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->Software_Name}}</h1>
    <div>
        {!!$post->Software_Information!!}
        {{$post->blacklisted}}
    </div>
@endsection
