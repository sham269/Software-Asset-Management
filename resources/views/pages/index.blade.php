@extends('layouts.app')
<link href="{{asset('build/assets/landingpage.css')}}" rel="stylesheet">
@section('content')

<section class="page-section">

<div class="container-fluid" id="Home_Container" style="background-image: url({{asset('build/assets/uni-image2.jpg')}})">
</div>
<div class="centered"> 
  <h1>DS software request Form </h1>
</div>

<div class="buttons"> 
  @if(Auth::User())
  
  @else
  <a class="btn btn-primary" href="{{ route('login') }}" role="button">Login</a>
  <a class="btn btn-secondary" href="{{ route('register') }}" role="button">Register</a>

  @endif
  {{-- <button>
    Boxy Boxy
  </button> --}}
  </div>
</div
</section>

@endsection
