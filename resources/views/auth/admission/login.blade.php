@extends('auth.guest')
@section('title', 'Login')
@section('heading', 'Sign In')
@section('contact', 'admissions@ue.edu.pk')
@section('action', route('login'))
@section('guest-admission')
    <div class="form-group">
        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control form-control-lg" required>
        @error('email')
            <span class="mt-2 @error('email') has-error @enderror">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
        <input type="password" id="password" name="password" class="form-control form-control-lg" required>
    </div>
    <div class="row no-gutters">
        <div class="col-md-4 ml-auto text-right">
            <button id="js-login-btn" type="submit" class="btn btn-primary btn-block btn-sm ">Sign in
            </button>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12 ml-auto p-1 font-weight-bold">
            Did you forget your password? <a href="{{ route('password.request') }}"
                title="Click here for Password Recovery">
                Click Here</a>
        </div>
    </div>
@endsection
