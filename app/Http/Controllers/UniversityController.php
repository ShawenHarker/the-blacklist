<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        return view('universities', [
            'universities' => University::latest()->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('add-new.university');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'website' => 'required|url',
            'student_count' => 'required',
        ]);

        University::create($attributes);

        return redirect('dashboard/universities')->with('success', 'You have successfully added a new university!');
    }
}
