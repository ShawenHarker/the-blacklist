<?php

use App\Http\Controllers\BlacklistedController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentTeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->group(function () {
    //Student Teachers
    Route::get('/', [StudentTeacherController::class, 'index'])
    ->name('dashboard');

    Route::get('students/add-new-student', [StudentTeacherController::class, 'create'])
        ->name('student.create');

    Route::post('students/add-new-student', [StudentTeacherController::class, 'store'])
        ->name('student.store');

    Route::get('students/add-new-students', [StudentTeacherController::class, 'importForm'])
        ->name('student.importForm');

    Route::post('students/add-new-students', [StudentTeacherController::class, 'import'])
        ->name('student.import');

    Route::get('students/view-student/{studentTeacher:id}', [StudentTeacherController::class, 'show'])
        ->name('student.show');

    Route::get('students/edit-student/{studentTeacher:id}', [StudentTeacherController::class, 'edit'])
        ->name('student.edit');

    Route::post('students/update-student/{studentTeacher:id}', [StudentTeacherController::class, 'update'])
        ->name('student.update');

    Route::delete('students/delete-student/{studentTeacher:id}', [StudentTeacherController::class, 'destroy'])
        ->name('student.destroy');

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
    Route::get('add-new-blacklist-student', [BlacklistedController::class, 'create'])
        ->name('blacklist.create');

    Route::post('add-new-blacklist-student', [BlacklistedController::class, 'store'])
        ->name('blacklist.store');
});

require __DIR__.'/auth.php';
