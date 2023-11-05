<?php

namespace App\Http\Controllers;

use App\Models\Blacklisted;
use App\Models\School;
use App\Models\StudentTeacher;
use Illuminate\Http\Request;

class BlacklistedController extends Controller
{
    public function create()
    {
        $studentTeachers = StudentTeacher::all();
        $schools = School::all();

        return view('blacklist.create', [
            'studentTeachers' =>  $studentTeachers,
            'schools' =>  $schools
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'student_teacher_id' => 'required|integer',
            'school_id' => 'required|integer',
            'reason' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'mp3' => 'file|mimes:mp3|max:2048',
            'video' => 'file|mimes:mp4,avi,mov,wmv,ogg,mpg,mpeg,flv,3gp,webm|max:2048',
        ]);

        $filePaths = [];

        switch ($request->hasFile) {
            case 'image':
                $filePaths['image'] = $request->file('image')->store('uploads/images', 'public');
                break;
            case 'mp3':
                $filePaths['mp3'] = $request->file('mp3')->store('uploads/mp3', 'public');
                break;
            case 'video':
                $filePaths['video'] = $request->file('video')->store('uploads/videos', 'public');
                break;
        }

        $attributes = array_merge($attributes, $filePaths);
        Blacklisted::create($attributes);
        return redirect('dashboard')->with('success', 'You have successfully added a new student!');
    }
}
