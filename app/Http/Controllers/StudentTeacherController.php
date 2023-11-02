<?php

namespace App\Http\Controllers;

use App\Models\StudentTeacher;
use Illuminate\Http\Request;

class StudentTeacherController extends Controller
{

    public function index()
    {
        $studentTeachers = StudentTeacher::latest()
            ->where('is_blacklisted', 0)
            ->paginate(10)
            ->withQueryString();

        return view('student-teachers.index', [
            'studentTeachers' => $studentTeachers,
        ]);
    }

    public function create()
    {
        $studentTeachers = StudentTeacher::all();
        return view('student-teachers.create', [
            'studentTeachers' => $studentTeachers,
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'location' => 'required|max:255',
            'school_id' => 'required|integer',
            'is_blacklisted' => 'required|integer',
        ]);

        if (!$attributes) {
            return redirect()->back()->withErrors(['school' => 'The specified school does not exist.']);
        } else {
            StudentTeacher::create($attributes);
            return redirect('student-teachers.index')->with('success', 'You have successfully added a new student!');
        }
    }

    public function show(StudentTeacher $studentTeacher)
    {
        return view('student-teachers.show', [
            'studentTeacher' => $studentTeacher,
        ]);
    }

    public function edit(StudentTeacher $studentTeacher)
    {
        return view('update.student', [
            'studentTeacher' => $studentTeacher,
        ]);
    }

    public function update(Request $request, StudentTeacher $studentTeacher)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|unique:studentTeachers,email,' . $studentTeacher->id,
            'location' => 'required|max:255',
            'school_id' => 'required|integer',
            'is_blacklisted' => 'required|integer',
        ]);

        if (!$attributes) {
            return redirect()->back()->withErrors(['school' => 'The specified school does not exist.']);
        } else {
            $studentTeacher->update($attributes);
            return redirect('dashboard')->with('success', 'You have successfully updated a student!');
        }
    }
}
