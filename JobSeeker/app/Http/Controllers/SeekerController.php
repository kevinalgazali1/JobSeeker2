<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileStoreRequest;

class SeekerController extends Controller
{
    public function index()
    {
        $jobposts = Jobpost::paginate(5);
        return view('seeker.dashboard', compact('jobposts'));
    }

    public function pelamar($jobpostId)
    {
        $jobpost_id = $jobpostId;
        return view('seeker.lamaran', compact('jobpost_id'));
    }

    public function pelamarStore(ProfileStoreRequest $request)
    {
        try {
            $user_id = auth()->id();
            $jobpost_id = $request->input('jobpost_id');

            // Memeriksa apakah seeker sudah pernah mengirimkan lamaran untuk job post tertentu
            if (Profile::where('user_id', $user_id)->where('jobpost_id', $jobpost_id)->exists()) {
                return redirect()->route('homeSeeker')->with([
                    'message' => 'Anda sudah mengirimkan lamaran untuk job post ini.',
                    'alert-type' => 'warning'
                ]);
            }

            // Jika belum, simpan lamaran
            $gambarcv = $request->file('gambarcv')->store('assets/gambarcv', 'public');
            Profile::create($request->except('gambarcv') + [
                'gambarcv' => $gambarcv,
                'user_id' => $user_id,
                'jobpost_id' => $jobpost_id,
            ]);

            return redirect()->route('homeSeeker')->with([
                'message' => 'Lamaran anda berhasil dikirim',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('homeSeeker')->with([
                'message' => 'Gagal membuat lamaran. Error: ' . $e->getMessage(),
                'alert-type' => 'danger'
            ]);
        }
    }

    public function detailseeker($jobpostId)
    {
        $jobpost = Jobpost::findOrFail($jobpostId);
        return view('seeker.show', compact('jobpost'));
    }

    public function seekerjob()
    {
        $jobposts = Jobpost::latest()->get();
        return view('seeker.job', compact('jobposts'));
    }

    public function applications()
    {
        $user_id = auth()->id();
        $applications = Profile::where('user_id', $user_id)->get();

        return view('seeker.applications', compact('applications'));
    }

    public function seekerprofile()
    {
        return view('seeker.profile');
    }

    public function seekerupdateProfile(Request $request)
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

        return redirect()->route('seeker')->with([
            'message' => 'Profile successfully updated.',
            'alert-type' => 'success'
        ]);
    }

    public function search(Request $request)
{
    $query = JobPost::query();

    if ($request->filled('jenis')) {
        $query->where('posisi', 'like', '%' . $request->jenis . '%');
    }

    if ($request->filled('location')) {
        $query->where('lokasi', $request->location);
    }

    if ($request->filled('job_type')) {
        $query->where('tipe', $request->job_type);
    }

    $jobposts = $query->get();

    return view('seeker.dashboard', compact('jobposts'));
}

}
