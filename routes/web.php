<?php

use App\Http\Controllers\Admission\AdmissionProfileController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return view('student-404');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/check', [JobsController::class, 'checkForJob'])->name('checkForJob');

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/balance', [ProfileController::class, 'edit'])->name('profile.balance');
    Route::get('/profile/inbox', [ProfileController::class, 'edit'])->name('profile.inbox');
    Route::get('/profile/account-setting', [ProfileController::class, 'edit'])->name('profile.account-setting');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdmissionProfileController::class)->group(function () {
    Route::prefix('profile-detail')->group(function () {
        Route::get('/', 'createProfile')->name('admission.profile-detail.create');
        Route::post('/', 'storeProfile')->name('admission.profile-detail.store');
        Route::get('/{id}', 'editProfile')->name('admission.profile-detail.edit');
        Route::post('/{id}', 'updateProfile')->name('admission.profile-detail.update');
    });
    Route::prefix('address-detail')->group(function () {
        Route::get('/', 'createAddress')->name('admission.address-detail.create');
        Route::post('/', 'storeAddress')->name('admission.address-detail.store');
        Route::get('/{id}', 'editAddress')->name('admission.address-detail.edit');
        Route::post('/{id}', 'updateAddress')->name('admission.address-detail.update');
    });
    Route::prefix('disability-detail')->group(function () {
        Route::get('/', 'createDisability')->name('admission.disability-detail.create');
        Route::post('/', 'storeDisability')->name('admission.disability-detail.store');
        Route::get('/{id}', 'editDisability')->name('admission.disability-detail.edit');
        Route::post('/{id}', 'updateDisability')->name('admission.disability-detail.update');
    });
    Route::prefix('other-detail')->group(function () {
        Route::get('/', 'createOther')->name('admission.other-detail.create');
        Route::post('/', 'storeOther')->name('admission.other-detail.store');
        Route::get('/{id}', 'editOther')->name('admission.other-detail.edit');
        Route::post('/{id}', 'updateOther')->name('admission.other-detail.update');
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/faculty.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/admission.php';
require __DIR__ . '/jobs.php';
