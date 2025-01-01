<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $host = explode('.', request()->host())[0];
        if ($host == 'students') {
            return redirect()->route('login');
        } else if ($host == 'admin') {
            return redirect()->route('login');
        } else if ($host == 'faculty') {
            return redirect()->route('login');
        } else if ($host == 'jobs') {
            return view('auth.jobs.register');
        } else if ($host == 'admission') {
            return view('auth.admission.register');
        }
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $host = explode('.', request()->host())[0];
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'max:32', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'min:11', 'max:11'],
            'cnic' => ['required', 'min:13', 'max:13'],
            'terms' => ['required'],
        ]);
        $fullName = explode(' ', $request->name);
        $fname = $fullName[0];
        $lname = "";
        if (count($fullName) > 1) {
            $lname = $fullName[1];
        }

        $role = 0;
        if ($host == 'admission') {
            $role = 4;
        } else if ($host == 'jobs') {
            $role = 5;
        }

        $user = User::create([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone,
            'cnic' => $request->cnic,
            'role_id' => $role,
        ]);

        event(new Registered($user));
        $user->sendEmailVerificationNotification();

        Auth::login($user);
        $user_id = Auth::id();
        $session = new UserSession();
        $session->user_id = $user_id;
        $session->login_time = now(); // `now()` returns a Carbon instance with the current date and time
        $session->save();

        return redirect(RouteServiceProvider::HOME)->with('status', [
            'type' => 'success', // or 'danger'
            'content' => [
                'icon' => 'fa fa-check',
                'message' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.'
            ]
        ]);
    }
}
