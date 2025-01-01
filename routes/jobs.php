<?php

use App\Http\Controllers\Admission\AdmissionProfileController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;

Route::domain('jobs.uoe.edu.pk.localhost')->middleware(['auth', 'verified'])->group(function () {
    Route::fallback(function () {
        return view('404');
    });

    Route::get('/', function () {
        return "yes Jobs";
    });

    Route::controller(JobsController::class)->prefix('jobs')->group(function () {

        Route::get('/all', 'allJobs')->name('jobs.all');

        Route::get('/apply/{id}', 'createApply')->name('jobs.apply.create');
        Route::post('/apply', 'storeApply')->name('jobs.apply.store');
        Route::get('/applications', 'jobApplications')->name('jobs.my-application.index');

        Route::get('/academic-details', 'createAcademicDetails')->name('jobs.academic-details.create');
        Route::post('/academic-details', 'storeAcademicDetails')->name('jobs.academic-details.store');
    });
});
