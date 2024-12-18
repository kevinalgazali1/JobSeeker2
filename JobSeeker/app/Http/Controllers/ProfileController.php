<?php

namespace App\Http\Controllers;

use App\Models\Jobpost;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request, $jobPostId = null)
    {
        // Jika rekruter tidak login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Jika ada parameter jobPostId
        if ($jobPostId) {
            // Temukan pekerjaan dengan ID yang sesuai
            $jobPost = Jobpost::findOrFail($jobPostId);

            // Pastikan rekruter hanya dapat melihat pelamar untuk pekerjaannya sendiri
            if (auth()->id() != $jobPost->user_id) {
                abort(403, 'Unauthorized action.');
            }

            // Ambil daftar pelamar untuk pekerjaan tertentu
            $profiles = Profile::where('jobpost_id', $jobPostId)->get();

            return view('recruter.pelamar', compact('profiles', 'jobPost'));
        }

        // Jika tidak ada parameter jobPostId
        // Ambil daftar semua pelamar yang sesuai dengan pekerjaan yang dibuat oleh rekruter yang sedang login
        $profiles = Profile::whereHas('jobpost', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('recruter.pelamar', compact('profiles'));
    }

    public function approveProfile(Profile $profile)
    {
        // Validasi apakah pembayaran sudah disetujui sebelumnya
        if ($profile->status === 'disetujui') {
            return redirect()->back()->with([
                'message' => 'Lamaran sudah disetujui sebelumnya.',
                'alert-type' => 'warning',
            ]);
        }

        // Mengubah status pembayaran menjadi disetujui
        $profile->update(['status' => 'disetujui']);


        return redirect()->back()->with([
            'message' => 'Lamaran berhasil disetujui.',
            'alert-type' => 'success',
        ]);
    }

    public function rejectProfile(Profile $profile)
    {
        // Validasi apakah pembayaran sudah ditolak sebelumnya
        if ($profile->status === 'ditolak') {
            return redirect()->back()->with([
                'message' => 'Lamaran sudah ditolak sebelumnya.',
                'alert-type' => 'warning',
            ]);
        }

        // Mengubah status lamaran menjadi ditolak
        $profile->update(['status' => 'ditolak']);


        return redirect()->back()->with([
            'message' => 'Lamaran berhasil ditolak.',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(Profile $profile)
    {
    
        // Hapus pembayaran
        $profile->delete();
    
        return redirect()->back()->with([
            'message' => 'Lamaran berhasil dihapus.',
            'alert-type' => 'success',
        ]);
    }

    public function editProfile($profileId)
{
    $profile = Profile::findOrFail($profileId);

    return view('seeker.edit', compact('profile'));
}

public function updateProfile(Request $request, $profileId)
{
    $request->validate([
        // Tambahkan aturan validasi sesuai kebutuhan
    ]);

    $profile = Profile::findOrFail($profileId);

    // Update data profil dari request
    $profile->update([
        'nama' => $request->input('nama'),
        'tanggal_lahir' => $request->input('tanggal_lahir'),
        // Tambahkan field lainnya sesuai kebutuhan
    ]);

    return redirect()->route('seeker.applications')->with([
        'message' => 'Profile updated successfully.',
        'alert-type' => 'success'
    ]);
}
}
