<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RecruterController extends Controller
{
    public function index(){
        $jobposts = Jobpost::paginate(5);

        return view('recruter.dashboard', compact('jobposts'));
    }

    public function detailrecruter($jobpostId)
    {
        $jobpost = Jobpost::findOrFail($jobpostId);
        return view('recruter.show', compact('jobpost'));
    }

    public function recruterprofile()
    {
        return view('recruter.profile');
    }

    public function recruterupdateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the changes
        $user->save();

        return redirect()->route('recruter')->with([
            'message' => 'Profile successfully updated.',
            'alert-type' => 'success'
        ]);
    }
    
}
