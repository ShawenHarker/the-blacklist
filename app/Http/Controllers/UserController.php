<?php

namespace App\Http\Controllers;

use App\Models\StudentTeacher;

class UserController extends Controller
{
    public function index()
    {

        $studentTeachers = StudentTeacher::latest()
        ->paginate(10);

        return view('dashboard', [
            'studentTeachers' => $studentTeachers
        ]);
    }
}
