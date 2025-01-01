<?php

use App\Http\Controllers\Admission\AdmissionApplicationController;
use App\Http\Controllers\Admission\AdmissionProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::domain('admission.uoe.edu.pk.localhost')->middleware(['auth', 'verified'])->group(function () {
    Route::fallback(function () {
        return view('404');
    });

    Route::get('/', function () {
        return "yes Admission";
    });
    // Route::get('/check', [JobsController::class, 'checkForJob'])->name('checkForJob');


    Route::controller(AdmissionApplicationController::class)->group(function () {
        Route::get('/choose-program', 'createProgram')->name('admission.choose-program.create');
        Route::post('/choose-program', 'storeProgram')->name('admission.choose-program.store');
        Route::get('/apply', 'createApply')->name('admission.apply.create');
        Route::post('/apply', 'storeApply')->name('admission.apply.store');
        Route::get('/academic-details', 'createAcademicDetails')->name('admission.academic-details.create');
        Route::post('/academic-details', 'storeAcademicDetails')->name('admission.academic-details.store');
        Route::get('/my-applications', 'index')->name('admission.my-application.index');
        Route::get('/get-programs/{level}', 'getPrograms')->name('get-programs');
    });

    Route::get('/check-out', [DashboardController::class, 'createCheckout'])->name('admission.checkout.create');
    Route::post('/check-out', [DashboardController::class, 'storeCheckout'])->name('admission.checkout.store');
});
