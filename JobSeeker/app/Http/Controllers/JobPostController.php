<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobPostStoreRequest;
use App\Http\Requests\JobPostUpdateRequest;
use Illuminate\Auth\Access\AuthorizationException;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobposts = Jobpost::latest()->get();
        return view('recruter.index', compact('jobposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recruter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPostStoreRequest $request)
    {
        try {
            if ($request->validated()) {
                $user_id = $request->user()->id;
                $gambar = $request->file('gambar')->store('assets/jobpost', 'public');
                Jobpost::create($request->except('gambar') + ['gambar' => $gambar, 'user_id' => $user_id]);
            }

            return redirect()->route('recruter.job')->with([
                'message' => 'Job Berhasil Dibuat',
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('recruter.job')->with([
                'message' => 'Gagal membuat job post. Error: ' . $e->getMessage(),
                'alert-type' => 'danger'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobpost $jobpost)
    {
        try {
            $this->authorize('update', $jobpost);

            // Lanjutkan dengan tampilan edit jika pengguna diotorisasi
            return view('recruter.edit', compact('jobpost'));
        } catch (AuthorizationException $e) {
            return redirect()->route('recruter.job')->with([
                'message' => 'Anda tidak diizinkan mengedit job post ini.',
                'alert-type' => 'warning'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPostUpdateRequest $request, $jobpostId)
    {
        // Temukan jobpost berdasarkan ID
        $jobpost = Jobpost::findOrFail($jobpostId);
    
        if ($request->validated()) {
            // Perbarui data jobpost di database
            $jobpost->update($request->validated());
        }
    
        return redirect()->route('recruter.job')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobpost $jobpost)
    {
        try {
            $this->authorize('delete', $jobpost);
            if (file_exists(public_path('storage/' . $jobpost->gambar))) {
                unlink(public_path('storage/' . $jobpost->gambar));
            }
            $jobpost->delete();

            return redirect()->back()->with([
                'message' => 'Data Berhasil DiHapus',
                'alert-type' => 'danger'
            ]);
        } catch (AuthorizationException $e) {
            return redirect()->route('recruter.job')->with([
                'message' => 'Anda tidak diizinkan menghapus job post ini.',
                'alert-type' => 'warning'
            ]);
        }
    }

    public function updateImage(Request $request, $jobpostId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $jobpost = Jobpost::findOrFail($jobpostId);
        if ($request->gambar) {
            unlink('storage/' . $jobpost->gambar);
            $gambar = $request->file('gambar')->store('assets/jobpost', 'public');

            $jobpost->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'message' => 'Gambar Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }
}
