<?php

namespace App\Http\Requests\Auth;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if (explode('.', request()->getHost())[0] == 'students') {
            return [
                'email' => ['required', 'string'],
                'password' => ['required', 'string'],
            ];
        } else {
            return [
                'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
            ];
        }
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();
        $host = explode('.', request()->getHost())[0];
        // Extract email and password from request
        $credentials = $this->only('email', 'password');
        $email = $this->input('email'); // or use $this->only('email')['email'] if $this->only() returns an array
        $password = $this->input('password'); // or use $this->only('password')['password']

        if ($host == 'students') {
            $student = Student::where('student_id', $email)->first();

            if ($student) {
                $user = User::where('id', $student->user_id)
                    ->where('role_id', 3)
                    ->first();
                if ($user) {
                    if (!Hash::check($password, $user->password)) {
                        RateLimiter::hit($this->throttleKey());
                        throw ValidationException::withMessages([
                            'email' => trans('auth.failed'),
                        ]);
                    }
                } else {
                    RateLimiter::hit($this->throttleKey());

                    throw ValidationException::withMessages([
                        'email' => trans('auth.failed'),
                    ]);
                }
            } else {
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
        } else {

            $user = User::where('email', $email)->first();
            if ($user) {

                $role = $user->role_id;

                if (($host == 'admin' && $role == 1) ||
                    ($host == 'faculty' && $role == 2) ||
                    ($host == 'jobs' && $role == 5) ||
                    ($host == 'admission' && $role == 4)
                ) {

                    if (! Auth::attempt($credentials, $this->boolean('remember'))) {
                        RateLimiter::hit($this->throttleKey());

                        throw ValidationException::withMessages([
                            'email' => trans('auth.failed'),
                        ]);
                    }
                } else {
                    RateLimiter::hit($this->throttleKey());

                    throw ValidationException::withMessages([
                        'email' => trans('auth.failed'),
                    ]);
                }
            } else {
                RateLimiter::hit($this->throttleKey());

                throw ValidationException::withMessages([
                    'email' => trans('auth.failed'),
                ]);
            }
        }
        if ($host == 'students') {
            Auth::login($user);
        }
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')) . '|' . $this->ip());
    }
}
