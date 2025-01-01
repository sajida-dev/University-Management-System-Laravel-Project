<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::domain('admin.uoe.edu.pk.localhost')->middleware(['auth', 'verified'])->group(function () {

    Route::fallback(function () {
        return view('student-404');
    });

    Route::get('/all-applications', [JobsController::class, 'allApplications'])->name('all-applications');

    Route::controller(DepartmentController::class)->prefix('department')->group(function () {
        Route::get('/', 'index')->name('departments.index');
        Route::get('/allocate-head', 'allocateCreate')->name('departments.allocate');
        Route::post('/allocate-head', 'allocateStore')->name('departments.allocate.store');
        Route::get('/create', 'create')->name('departments.create');
        Route::post('/', 'store')->name('departments.store');
        // Route::get('/{id}', 'show')->name('departments.show');
        Route::get('/d/{id}', 'destroy')->name('departments.destroy');

        Route::get('/get-faculty/{department_id}', 'getFacultyByDepartment')->name('getFuculty');
        Route::get('/{id}/edit', 'edit')->name('departments.edit');
        Route::put('/{id}', 'update')->name('departments.update');
    });

    Route::controller(ProgramController::class)->prefix('program')->group(function () {
        Route::get('/', 'index')->name('program.index');
        Route::get('/create', 'create')->name('program.create');
        Route::post('/', 'store')->name('program.store');
        //Route::get('/{id}', 'show')->name('program.show');
        Route::get('/{id}/edit', 'edit')->name('program.edit');
        Route::put('/{id}', 'update')->name('program.update');
        Route::get('/{id}', 'destroy')->name('program.destroy');
    });
    Route::controller(CourseController::class)->prefix('course')->group(function () {
        Route::get('/', 'index')->name('course.index');
        Route::get('/create', 'create')->name('course.create');
        Route::post('/', 'store')->name('course.store');
        Route::get('/allocate', 'allocate')->name('course.allocate.create');
        Route::post('/allocate', 'allocateStore')->name('course.allocate.store');
        Route::get('/allocated-courses', 'allocatedCourses')->name('course.allocate.index');
        //Route::get('/{id}', 'show')->name('course.show');
        Route::get('/{id}/edit', 'edit')->name('course.edit');
        Route::put('/{id}', 'update')->name('course.update');
        Route::get('/{id}', 'destroy')->name('course.destroy');
    });


    Route::get('/faculty', [DashboardController::class, 'faculty'])->name('faculty.index');
    Route::get('/admission-applications', [DashboardController::class, 'admissionApplication'])->name('admission.application');
    Route::get('/application/success/{id}', [DashboardController::class, 'admissionApplicationSuccess'])->name('admission.application.success');

    Route::controller(JobsController::class)->prefix('jobs')->group(function () {
        Route::get('/application-success/{id}', 'applicationSuccess')->name('application.success');

        Route::get('/', 'index')->name('jobs.index');
        Route::get('/new', 'create')->name('jobs.create');
        Route::post('/', 'store')->name('jobs.store');
        Route::get('/{id}/edit', 'edit')->name('jobs.edit');
        Route::put('/{id}', 'update')->name('jobs.update');
        Route::get('/{id}', 'destroy')->name('jobs.destroy');
    });
    Route::controller(ResultController::class)->prefix('result')->group(function () {
        Route::get('/', 'index')->name('admin.result.index');
        Route::get('/create', 'create')->name('admin.result.create');
        Route::post('/', 'store')->name('admin.result.store');
        //Route::get('/{id}', 'show')->name('admin.result.show');
        Route::get('/{id}/edit', 'edit')->name('admin.result.edit');
        Route::put('/{id}', 'update')->name('admin.result.update');
        Route::get('/{id}', 'destroy')->name('admin.result.destroy');
    });
    Route::controller(RoomController::class)->prefix('room')->group(function () {
        Route::get('/', 'index')->name('room.index');
        Route::get('/create', 'create')->name('room.create');
        Route::post('/', 'store')->name('room.store');
        Route::get('/{id}', 'destroy')->name('room.destroy');
        //Route::get('/{id}', 'show')->name('room.show');
        Route::get('/{id}/edit', 'edit')->name('room.edit');
        Route::put('/{id}', 'update')->name('room.update');
    });
    Route::controller(StudentController::class)->prefix('students')->group(function () {
        Route::get('/', 'index')->name('students.index');
        Route::get('/s/{id}', 'show')->name('admin.student.show');
        Route::get('/{id}/edit', 'edit')->name('admin.student.edit');
        Route::put('/{id}', 'update')->name('admin.student.update');
        Route::get('/{id}', 'destroy')->name('admin.student.destroy');
    });
});
