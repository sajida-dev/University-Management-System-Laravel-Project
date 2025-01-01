@extends('auth.guest')
@section('title', 'Reset Password')
@section('heading', 'Enter new Password')
@section('action', route('password.store'))
@section('guest-admission')
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div class="form-group">
        <label class="form-label" for="username">Email <span class="text-danger">*</span></label>
        <input type="email" value="{{ old('email', $request->email) }}" name="email" class="form-control form-control-lg"
            required autofocus autocomplete="username">
        @error('email')
            <span class="mt-2 has-error">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control form-control-lg" required>
        @error('password')
            <span class="mt-2 has-error">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
        <input type="password" name="password_confirmation" class="form-control form-control-lg" required>
        @error('password_confirmation')
            <span class="mt-2 has-error">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="row no-gutters" style="margin-bottom: 25px;">
        <div class="col-md-8 ml-auto text-right">
            <button id="js-login-btn" type="submit" style="padding: 10px"
                class="btn btn-primary btn-block btn-sm ">{{ __('Reset Password') }}
            </button>
        </div>
    </div>
@endsection
