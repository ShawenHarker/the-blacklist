<?php

namespace App\Http\Controllers;

use App\Models\Blacklisted;
use App\Models\User;
use Illuminate\Http\Request;

class BlacklistedController extends Controller
{
    public function index()
    {
        $users = User::latest()->where('is_blacklisted', 1)->paginate(10)->withQueryString();
        return view('blacklisted-students', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $users = User::all()->where('is_blacklisted', 0)->where('role_id', 1);
        return view('add-new.blacklist-student', [
            'users' =>  $users
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => 'required|integer',
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

        $user = User::find($attributes['user_id']);

        if (!$user) {
            return redirect()->back()->withErrors(['user' => 'The specified student does not exist.']);
        } else {
            $attributes = array_merge($attributes, $filePaths);

            Blacklisted::create($attributes);
            $user->update(['is_blacklisted' => 1]);

            return redirect('dashboard/blacklisted-students')->with('success', 'You have successfully added a new student!');
        }
    }

}
