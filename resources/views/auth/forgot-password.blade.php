@extends('auth.guest')
@section('title', 'Forgot Password')
@section('heading', 'Enter your Email')
@section('action', route('password.email'))
@section('guest-admission')
    <div class="form-group">
        <label class="form-label" for="username">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control form-control-lg" required>
        @error('email')
            <span class="mt-2 has-error">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="row no-gutters" style="margin-bottom: 25px;">
        <div class="col-md-8 ml-auto text-right">
            <button id="js-login-btn" type="submit" style="padding: 10px"
                class="btn btn-primary btn-block btn-sm ">{{ __('Email Password Reset Link') }}
            </button>
        </div>
    </div>
@endsection
