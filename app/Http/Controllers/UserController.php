<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'location' => 'required',
            'university' => 'required',
            'blacklisted' => 'required',
        ]);

        $universityName = $attributes['university'];
        $university = University::where('name', $universityName)->first();
        $attributes['is_blacklisted'] = ($attributes['blacklisted'] === 'Yes') ? 1 : 0;

        if ($university) {

            unset($attributes['university']);
            unset($attributes['blacklisted']);

            $attributes['university_id'] = $university->id;

            User::create($attributes);

            return redirect('dashboard/students')->with('success', 'You have successfully added a new student!');
        } else {
            return redirect()->back()->withErrors(['university' => 'The specified university does not exist.']);
        }
    }

}
