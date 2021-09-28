@extends('layouts.app')
@section('main')
<div class="col-md-4 col-sm-6 ml-auto mr-auto">
    <form class="form"  method="POST" action="{{ route('password.email') }}">@csrf
        <div class="card card-login">
            <div class="card-header ">
                <h3 class="header text-center">Reset Password</h3>
            </div>
            <div class="card-body ">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @error('email')
                        <div class="alert alert-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                    
                    <div class="form-group">
                        <label>Email address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning btn-wd">{{ __('Send Password Reset Link') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection

        
            
        
  

