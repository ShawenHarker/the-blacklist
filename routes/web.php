<?php

use App\Http\Controllers\BlacklistedController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentTeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [UserController::class, 'index'])
    ->name('dashboard');

    //Active Students
    Route::get('student-teachers', [StudentTeacherController::class, 'index'])
        ->name('dashboard.student');

    Route::get('students/add-new-student', [StudentTeacherController::class, 'create'])
        ->name('dashboard.student.create');

    Route::post('students/add-new-student', [StudentTeacherController::class, 'store'])
        ->name('dashboard.student.store');

    Route::get('students/view-student/{user:id}', [StudentTeacherController::class, 'show'])
        ->name('dashboard.student.show');

    Route::get('students/edit-student/{user:id}', [StudentTeacherController::class, 'edit'])
        ->name('dashboard.student.edit');

    //schools
    Route::get('schools', [SchoolController::class, 'index'])
        ->name('school.index');

    Route::get('schools/add-new-school', [SchoolController::class, 'create'])
        ->name('school.create');

    Route::post('schools/add-new-school', [SchoolController::class, 'store'])
        ->name('school.store');

    Route::get('schools/view-school/{school:id}', [SchoolController::class, 'show'])
        ->name('school.show');

    Route::get('schools/edit-school/{school:id}', [SchoolController::class, 'edit'])
        ->name('school.edit');

    Route::post('schools/update-school/{school:id}', [SchoolController::class, 'update'])
        ->name('school.update');

    Route::delete('schools/delete-school/{school:id}', [SchoolController::class, 'destroy'])
        ->name('school.destroy');

    //Blacklisted
    Route::get('blacklisted-students', [BlacklistedController::class, 'index'])
        ->name('dashboard.blacklisted');

    Route::get('blacklisted-students/add-new-blacklist-student', [BlacklistedController::class, 'create'])
        ->name('dashboard.blacklisted.create');

    Route::post('blacklisted-students/add-new-blacklist-student', [BlacklistedController::class, 'store'])
        ->name('dashboard.blacklisted.store');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
