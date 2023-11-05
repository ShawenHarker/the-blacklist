<?php

namespace App\Http\Controllers;

use App\Models\Blacklisted;
use App\Models\School;
use App\Models\StudentTeacher;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::latest()
            ->filter(request(['search']))
            ->paginate(10)
            ->withQueryString();

        return view('schools.index', [
            'schools' => $schools,
        ]);
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'website' => 'required|url|max:255',
        ]);

        School::create($attributes);

        return redirect(route('school.index'))->with('success', 'You have successfully added a new school!');
    }

    public function show(School $school)
    {
        $students = StudentTeacher::latest()
        ->whereIn('id', $school->blacklisted
        ->pluck('student_teacher_id'))
        ->paginate(10);

        

        return view('schools.show', [
            'school' => $school,
            'students' => $students
        ]);
    }

    public function edit(School $school)
    {
        return view('schools.edit', [
            'school' => $school,
        ]);
    }

    public function update(Request $request, School $school)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'website' => 'required|url|max:255',
        ]);

        $school->update($attributes);

        return redirect(route('school.index'))->with('success', 'You have successfully updated the school!');
    }

    public function destroy(School $school)
    {
        $school->delete();

        return response(null, 204);
    }
}
