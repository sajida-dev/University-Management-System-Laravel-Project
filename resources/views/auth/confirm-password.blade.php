{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('auth.guest')
@section('title', 'Forgot Password')
@section('heading', 'Enter your Email')
@section('action', route('password.confirm'))
@section('guest-admission')
    <div class="form-group">
        <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control form-control-lg" required>
        @error('password')
            <span class="mt-2 has-error">
                {{ $message }}
            </span>
        @enderror
    </div>
    <div class="row no-gutters" style="margin-bottom: 25px;">
        <div class="col-md-8 ml-auto text-right">
            <button id="js-login-btn" type="submit" style="padding: 10px"
                class="btn btn-primary btn-block btn-sm ">{{ __('Confirm') }}
            </button>
        </div>
    </div>
@endsection
