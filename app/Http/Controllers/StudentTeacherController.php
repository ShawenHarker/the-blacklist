<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\StudentTeacher;
use App\Imports\StudentTeachersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentTeacherController extends Controller
{

    public function index()
    {
        $studentTeachers = StudentTeacher::latest()
            ->paginate(10)
            ->withQueryString();

        return view('student-teachers.index', [
            'studentTeachers' => $studentTeachers,
        ]);
    }

    public function create()
    {
        return view('student-teachers.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'location' => 'required|max:255',
        ]);

        if (!$attributes) {
            return redirect()->back()->withErrors(['school' => 'The specified school does not exist.']);
        } else {
            StudentTeacher::create($attributes);
            return redirect(route('dashboard'))->with('success', 'You have successfully added a new student!');
        }
    }

    public function importForm()
    {
        return view('student-teachers.importForm');
    }

    public function import()
    {
        try {
            Excel::import(new StudentTeachersImport, request()->file('csv_file'), null, \Maatwebsite\Excel\Excel::CSV);

            return redirect(route('dashboard'))->with('success', 'You have successfully added new students!');
        } catch (\Exception $e) {
            return redirect(route('dashboard'))->with('error', 'Error importing students: ' . $e->getMessage());
        }
    }

    public function show(StudentTeacher $studentTeacher){

        $schools = School::latest()
            ->whereIn('id', $studentTeacher->blacklisted->pluck('school_id'))
                ->paginate(10);

        $blacklisting = $studentTeacher->blacklisted
            ->all();

        return view('student-teachers.show', [
            'studentTeacher' => $studentTeacher,
            'schools' => $schools,
            'blacklisting' => $blacklisting,
        ]);
    }

    public function edit(StudentTeacher $studentTeacher)
    {
        $schools = School::latest()
            ->whereIn('id', $studentTeacher->blacklisted
            ->pluck('school_id'))
            ->paginate(10);

        return view('student-teachers.edit', [
            'studentTeacher' => $studentTeacher,
            'schools' => $schools
        ]);
    }

    public function update(Request $request, StudentTeacher $studentTeacher)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'location' => 'required|max:255',
        ]);

        $studentTeacher->update($attributes);
        return redirect(route('dashboard'))->with('success', 'You have successfully updated a student!');
    }

    public function destroy(StudentTeacher $studentTeacher)
    {
        $studentTeacher->delete();

        return response(null, 204);
    }
}
