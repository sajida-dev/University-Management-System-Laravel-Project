<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\UserSession;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $host = explode('.', request()->host())[0];
        if ($host == 'students') {
            return view('auth.students.login');
        } else if ($host == 'admin') {
            return view('auth.login');
        } else if ($host == 'faculty') {
            return view('auth.faculty.login');
        } else if ($host == 'admission') {
            return view('auth.admission.login');
        } else if ($host == 'jobs') {
            return view('auth.jobs.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user_id = Auth::id();
        $session = new UserSession();
        $session->user_id = $user_id;
        $session->login_time = now(); // `now()` returns a Carbon instance with the current date and time
        $session->save();

        return redirect()->intended(RouteServiceProvider::HOME)->with('status', [
            'type' => 'success', // or 'danger'
            'content' => [
                'icon' => 'fa fa-bell',
                'message' => 'Longin Successfully!'
            ]
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user_id = Auth::id();
        $session = UserSession::where('user_id', $user_id)
            ->whereNull('logout_time')
            ->first();
        if ($session) {
            // `now()` returns a Carbon instance with the current date and time
            $session->logout_time = now();
            $session->save();
        }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/');
    }
}
