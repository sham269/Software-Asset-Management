@extends('layouts.app')

@section('content')
    <h1>Software Available</h1>
    @if(count($posts) > 0)
    @foreach($posts as $post)
  
        
            @if($post->blacklisted =='["Blacklisted"]')
            <div class="card text-white bg-dark card-body my-2">
            <s><h3>{{$post->Software_Name}}</s></h3>
            <small> Written on {{$post->created_at}}</small>
            @if(Auth::user()->is_admin==1)
            <div class="form-group">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-mid']) !!}
        
            {{Form::submit('DELETE', ['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
            @endif
            </div>
            

           @else
           <div class="card card-body my-2">
            <h3><a href="/posts/{{$post->id}}">{{$post->Software_Name}}</a></h3>
            <small> Written on {{$post->created_at}}</small>
          
    @if(Auth::user()->is_admin==1)
    <div class="form-group">
    <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-mid']) !!}

    {{Form::submit('DELETE', ['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
    </div>
    @endif
    @endif
        </div>
        @endforeach
        {{$posts->links()}}
        
    @else
        <p>Software Unavailable</p>
    @endif
@endsection
