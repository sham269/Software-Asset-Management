@extends('layouts.app')
@section('content')
<h1 class="text-center"> My Profile</h1>
<link href="{{asset('build/assets/user_profile.css')}}" rel="stylesheet">
{!! Form::open(['action' => ['App\Http\Controllers\RequestsController@UserUpdate',Auth::User()->id],'method'=>'PUT']) !!}
<div class="container">
    <div class="row gutters">
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="account-settings">
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                    </div>
                    <h5 class="user-name">{{Auth::User()->name}}</h5>
                    <h6 class="user-email">{{Auth::User()->email}}</h6>
                </div>
                <div class="about">
                    <h5>Role</h5>
                    <p>{{Auth::User()->role}}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
   
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
    <div class="card h-100">
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-2 text-primary">Personal Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {{Form::label('name','name')}}
                        {{Form::text('name',Auth::User()->name,['class'=>'form-control','placeholder'=>'Enter Name'])}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        {{Form::label('email','email')}}
                        {{Form::text('email',Auth::User()->email,['class'=>'form-control','placeholder'=>'Enter Email'])}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="phone">role</label>
                        <input type="text" class="form-control" id="phone" placeholder={{Auth::User()->role}} @disabled(true)>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        @if(Auth::User()->verified== 1 )
                            <label for="website">Verification Status</label>
                            <input type="text" class="form-control" id="website" placeholder="Verfied" @disabled(true)>
                        
                        @else
                            <label for="website">Verification Status</label>
                            <input type="text" class="form-control" id="website" placeholder="Not Verified" @disabled(true)>
                        
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mt-3 mb-2 text-primary">Other Details</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    
                    <div class="form-group">
                        @if(Auth::User()->is_admin==1)
                            <label for="Street">Admin?</label>
                            <input type="name" class="form-control" id="Street" placeholder="Admin" @disabled(true)>
                        
                        @else
                        <label for="Street">Admin?</label>
                        <input type="name" class="form-control" id="Street" placeholder="Not Admin" @disabled(true)>
                        @endif
                    </div>
                    
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="ciTy">Role</label>
                        <input type="name" class="form-control" id="ciTy" placeholder={{Auth::User()->role}} @disabled(true)>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="sTate">Created_At</label>
                        <input type="text" class="form-control" id="sTate" placeholder={{Auth::User()->created_at}} @disabled(true)>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label for="zIp">Updated at</label>
                        <input type="text" class="form-control" id="zIp" placeholder={{Auth::User()->updated_at}} @disabled(true)>
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="text-right">
                        <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                        
                        {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
  
                      

@endsection
