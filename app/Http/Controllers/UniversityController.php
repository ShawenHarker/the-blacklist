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
}
