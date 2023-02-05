@extends('layouts.app')
{{-- LOOK AT THIS CODE TOMMOROW  --}}
{{-- @if(Auth::user()->is_admin==1)
<ul class="navbar-nav mr-auto">
    <li>
        <a class="nav-link" href="/posts/create">Create Post</a>
      </li>
    </ul>

@endif --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- @if(Auth::user()->is_admin==1)

                    <button type="button" class="btn btn-dark">Add</button>
                    @endif --}}
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
