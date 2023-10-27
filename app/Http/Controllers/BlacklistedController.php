<?php

namespace App\Http\Controllers;

use App\Models\Blacklisted;
use App\Models\User;
use Illuminate\Http\Request;

class BlacklistedController extends Controller
{
    public function create()
    {
        return view('add-new.blacklist-student');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email',
            'reason' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'mp3' => 'file|mimes:mp3|max:2048',
            'video' => 'file|mimes:mp4,avi,mov,wmv,ogg,mpg,mpeg,flv,3gp,webm|max:2048',
        ]);

        $filePaths = [];

        if ($request->hasFile('image')) {
            $filePaths['image'] = $request->file('image')->store('uploads/images', 'public');
        }

        if ($request->hasFile('mp3')) {
            $filePaths['mp3'] = $request->file('mp3')->store('uploads/mp3', 'public');
        }

        if ($request->hasFile('video')) {
            $filePaths['video'] = $request->file('video')->store('uploads/videos', 'public');
        }

        $userFirst = $attributes['first_name'];
        $userLast = $attributes['last_name'];
        $userEmail = $attributes['email'];

        $user = User::where(['first_name' => $userFirst, 'last_name' => $userLast, 'email' => $userEmail])->first();

        if ($user) {
            $attributes['user_id'] = $user->id;

            unset($attributes['first_name']);
            unset($attributes['last_name']);
            unset($attributes['email']);

            $attributes = array_merge($attributes, $filePaths);

            Blacklisted::create($attributes);
            $user->update(['is_blacklisted' => 1]);

            return redirect('dashboard/blacklisted-students')->with('success', 'You have successfully added a new student!');
        } else {
            return redirect()->back()->withErrors(['user' => 'The specified student does not exist.']);
        }
    }

}
