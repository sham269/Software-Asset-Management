@extends('layouts.app')

@section('content')
    <h1 class="text-center">Software Supported</h1>
    @if(count($posts) > 0)
    @foreach($posts as $post)
  
        
            @if($post->blacklisted =="Blacklisted")
            <div class="card text-white bg-dark card-body my-2">
            <s><h3>{{$post->Software_Name}} - Blacklisted</s></h3>
            
            <small> Written on {{$post->created_at}}</small>
        
            </div>
            

           @else
           <div class="card card-body my-2">
            <h3>{{$post->Software_Name}}</a></h3>
            <p>{{$post->Software_Information}}</p>
            <small> Written on {{$post->created_at}}</small>
        </div>
   

    @endif
        
        @endforeach
        {{$posts->links()}}
        
    @else
        <p>Software Unavailable</p>
    @endif
@endsection
