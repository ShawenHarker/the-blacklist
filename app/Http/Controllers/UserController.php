<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::latest()
            ->filter(request(['search', 'university']))
            ->paginate(10)
            ->withQueryString()
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

    public function create()
    {
        return view('add-new.student');
    }

    public function store()
    {
        //
    }
}
