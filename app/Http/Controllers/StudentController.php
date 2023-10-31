<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::latest()->where('is_blacklisted', 0)->paginate(10)->withQueryString();
        return view('students', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        $universities = University::all();
        return view('add-new.student', [
            'universities' => $universities,
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'location' => 'required|max:255',
            'university_id' => 'required|integer',
            'is_blacklisted' => 'required|integer',
        ]);

        if (!$attributes) {
            return redirect()->back()->withErrors(['university' => 'The specified university does not exist.']);
        } else {
            User::create($attributes);
            return redirect('dashboard')->with('success', 'You have successfully added a new student!');
        }
    }
}
