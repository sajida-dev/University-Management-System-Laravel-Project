<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::domain('faculty.uoe.edu.pk.localhost')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return "yes Faculty";
    });

    Route::controller(ResultController::class)->prefix('result')->group(function () {
        Route::get('/', 'indexMids')->name('faculty.mids.index');
        Route::get('/all', 'indexFinals')->name('faculty.final.index');
        Route::get('/mids', 'createMids')->name('faculty.mids.create');
        Route::post('/mids', 'storeMids')->name('faculty.mids.store');
        Route::get('/finals', 'createFinals')->name('faculty.final.create');
        Route::post('/finals', 'storeFinals')->name('faculty.final.store');
        Route::get('/{id}/mids', 'editMids')->name('faculty.mids.edit');

        Route::get('/{id}/finals', 'editFinals')->name('faculty.final.edit');
        Route::post('/{id}/mids', 'updateMids')->name('faculty.mids.update');
        Route::post('/{id}/finals', 'updateFinals')->name('faculty.final.update');
        //Route::get('/{id}', 'destroy')->name('faculty.result.destroy');
    });

    Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'attendanceStore'])->name('attendance.store');
    Route::get('/program/{programId}/courses', [AttendanceController::class, 'fetchCoursesForProgram']);
});
