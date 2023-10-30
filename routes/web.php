<?php

use App\Http\Controllers\BlacklistedController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [UserController::class, 'index'])
    ->name('dashboard');

    //Users
    Route::get('students', [StudentController::class, 'index'])
        ->name('dashboard.student');

    Route::get('students/add-new-student', [StudentController::class, 'create'])
        ->name('dashboard.student.create');

    Route::post('students/add-new-student', [StudentController::class, 'store'])
        ->name('dashboard.student.store');

    //Universities
    Route::get('universities', [UniversityController::class, 'index'])
        ->name('dashboard.universities');

    Route::get('universities/add-new-university', [UniversityController::class, 'create'])
        ->name('dashboard.university.create');

    Route::post('universities/add-new-university', [UniversityController::class, 'store'])
        ->name('dashboard.university.store');

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
