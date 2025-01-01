<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BloodGroup;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        # code...
        $host = explode('.', request()->host())[0];
        if ($host == 'students') {
            return view('pages.student.dashboard');
        } else if ($host == 'admin') {
            return view('pages.admin.dashboard');
        } else if ($host == 'faculty') {
            return view('pages.faculty.dashboard');
        } else if ($host == 'admission') {
            return view('pages.admission.dashboard');
        } else if ($host == 'jobs') {
            return view('pages.jobs.dashboard');
        }
    }


    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $user = User::with('personalInfo')->where('id', Auth::id())->first();
        $genders = Gender::all();
        $bloodGroups = BloodGroup::all();
        $religions = Religion::all();
        if (Auth::user()->role_id == 1) {
            return view('profile.admin_profile');
        }
        return view('profile.edit', compact('user', 'genders', 'bloodGroups', 'religions'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
