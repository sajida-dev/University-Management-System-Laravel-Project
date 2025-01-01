<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::domain('students.uoe.edu.pk.localhost')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return "yes students";
    });
    Route::fallback(function () {
        return view('student-404');
    });
    Route::get('/student/result', [StudentController::class, 'studentView'])->name('students.result.index');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('students.profile');
    Route::get('/student/fee', [StudentController::class, 'fee'])->name('students.fee');
});
