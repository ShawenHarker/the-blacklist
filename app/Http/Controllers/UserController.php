<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::latest()->filter(request(['search']))->get(),
        ]);
    }

    public function student()
    {
        $users = User::all();
        return view('students', [
            'users' => $users,
        ]);
    }

    public function blacklisted()
    {
        $users = User::all();
        return view('blacklisted-students', [
            'users' => $users
        ]);
    }
}
