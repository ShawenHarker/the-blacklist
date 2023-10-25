<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::latest()->filter(request(['search', 'university']))->paginate(10)->withQueryString(),
        ]);
    }

    public function student()
    {
        $users = User::latest()->paginate(10)->withQueryString();
        return view('students', [
            'users' => $users,
        ]);
    }

    public function blacklisted()
    {
        $users = User::latest()->paginate(10)->withQueryString();
        return view('blacklisted-students', [
            'users' => $users
        ]);
    }
}
