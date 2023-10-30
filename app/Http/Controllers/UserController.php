<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->where('role_id', 1)
        ->filter(request(['search', 'university']))
        ->paginate(10)->withQueryString();

        return view('dashboard', [
            'users' => $users
        ]);
    }
}
