@extends('layouts.app')
@section('main')
<div class="col-md-4 col-sm-6 ml-auto mr-auto">
    <form class="form" action="{{route('login')}}" method="POST">@csrf
        <div class="card card-login">
            <div class="card-header ">
                <h3 class="header text-center">Login</h3>
            </div>
            <div class="card-body ">
                <div class="card-body">
                   
                    @error('email')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" placeholder="Enter email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <a href="{{route('password.request')}}">Forgot Password</a>
                    </div>
                </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning btn-wd">Login</button>
            </div>
        </div>
    </form>
</div>
@endsection

        
            
        
  
