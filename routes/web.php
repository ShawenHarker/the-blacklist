<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\University;

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

Route::get('dashboard', function () {
    $users = User::all();
    return view('dashboard', [
        'users' => $users,
    ]);	
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard/students', function () {
    $users = User::all();
    return view('tables/students', [
        'users' => $users,
    ]);
});

Route::get('dashboard/universities', function () {
    $universities = University::all();
    return view('tables/universities', [
        'universities' => $universities
    ]);
});

Route::get('dashboard/blacklisted-students', function () {
    $users = User::all();
    return view('tables/blacklisted-students', [
        'users' => $users
    ]);
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
