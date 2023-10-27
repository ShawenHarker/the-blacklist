<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BlacklistedController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->get('dashboard', [UserController::class, 'index'])
    ->name('dashboard');

//Users
Route::middleware(['auth'])
    ->get('dashboard/students', [UserController::class, 'student'])
    ->name('dashboard.student');

Route::middleware(['auth'])
    ->get('dashboard/students/add-new-student', [UserController::class, 'create'])
    ->name('dashboard.student.create');

Route::middleware(['auth'])
    ->post('dashboard/students/add-new-student', [UserController::class, 'store'])
    ->name('dashboard.student.store');

//Universities
Route::middleware(['auth'])
    ->get('dashboard/universities', [UniversityController::class, 'index'])
    ->name('dashboard.universities');

Route::middleware(['auth'])
    ->get('dashboard/universities/add-new-university', [UniversityController::class, 'create'])
    ->name('dashboard.university.create');

Route::middleware(['auth'])
    ->post('dashboard/universities/add-new-university', [UniversityController::class, 'store'])
    ->name('dashboard.university.store');

//Blacklisted
Route::middleware(['auth'])
    ->get('dashboard/blacklisted-students', [UserController::class, 'blacklisted'])
    ->name('dashboard.blacklisted');

Route::middleware(['auth'])
    ->get('dashboard/blacklisted-students/add-new-blacklist-student', [BlacklistedController::class, 'create'])
    ->name('dashboard.blacklisted.create');

Route::middleware(['auth'])
    ->post('dashboard/blacklisted-students/add-new-blacklist-student', [BlacklistedController::class, 'store'])
    ->name('dashboard.blacklisted.store');

Route::middleware(['auth'])
    ->post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')->name('logout');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
