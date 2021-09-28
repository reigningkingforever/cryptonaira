@extends('layouts.app')

@section('main')

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Reset Password') }}
        </button>
    </div>
</div>
                    










<div class="col-md-4 col-sm-6 ml-auto mr-auto">
    <form class="form"  method="POST" action="{{ route('password.update') }}">@csrf
        <input type="hidden" name="token" value="{{ $token }}">
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
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                    </div>
                    <div class="form-group">
                        <label>Repeat Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    
                </div>
            </div>
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning btn-wd">{{ __('Reset your Password') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
