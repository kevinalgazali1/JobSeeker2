<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruterController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('homeAdmin');
    Route::get('/admin', [AdminController::class, 'indexadmin'])->name('admin');
    Route::get('admin/job', [AdminController::class, 'index'])->name('admin.job');
    Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/edit/{jobpost}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/update/{jobpostId}', [AdminController::class, 'update'])->name('admin.update');
    Route::put('admin/updateimage/{jobpostId}', [AdminController::class, 'updateImage'])->name('admin.updateImage');
    Route::delete('admin/destroy/{jobpost}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('admin/profiles/{jobPostId?}', [AdminController::class, 'indexprofile'])->name('admin.index');
    Route::get("/admin/user", [AdminController::class, 'listUsers'])->name('admin.user');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [AdminController::class, 'updateUser'])->name('admin.user.update');
    Route::delete('/admin/user/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('admin/detail/{jobpostId}', [AdminController::class, 'detailadmin'])->name('admin.detail');
    Route::put('admin/profiles/{profile}/approve', [ProfileController::class, 'approveProfile'])->name('admin.profile.approve');
    Route::put('admin/profiles/{profile}/reject', [ProfileController::class, 'rejectProfile'])->name('admin.profile.reject');
    Route::delete('admin/profiles/{profile}', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

Route::middleware(['auth', 'role:recruter'])->group(function () {
    Route::get('/recruter', [RecruterController::class, 'index'])->name('homeRecruter');
    Route::get('recruter/job', [JobPostController::class, 'index'])->name('recruter.job');
    Route::get('recruter/create', [JobPostController::class, 'create'])->name('recruter.create');
    Route::post('recruter/store', [JobPostController::class, 'store'])->name('recruter.store');
    Route::get('recruter/edit/{jobpost}', [JobPostController::class, 'edit'])->name('recruter.edit');
    Route::put('recruter/update/{jobpostId}', [JobPostController::class, 'update'])->name('recruter.update');
    Route::put('recruter/updateimage/{jobpostId}', [JobPostController::class, 'updateImage'])->name('recruter.updateImage');
    Route::delete('recruter/destroy/{jobpost}', [JobPostController::class, 'destroy'])->name('recruter.destroy');
    Route::get('profiles/{jobPostId?}', [ProfileController::class, 'index'])->name('recruter.index');
    Route::put('profiles/{profile}/approve', [ProfileController::class, 'approveProfile'])->name('recruter.profile.approve');
    Route::put('profiles/{profile}/reject', [ProfileController::class, 'rejectProfile'])->name('recruter.profile.reject');
    Route::delete('profiles/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/recruter/profile', [RecruterController::class, 'recruterprofile'])->name('recruter.profile');
    Route::post('/recruter/profile/update', [RecruterController::class, 'recruterupdateProfile'])->name('recruter.profile.update');
    Route::get('recruter/detail/{jobpostId}', [RecruterController::class, 'detailrecruter'])->name('recruter.detail');
});

Route::middleware(['auth', 'role:seeker'])->group(function () {
    Route::get('/seeker', [SeekerController::class, 'index'])->name('homeSeeker');
    Route::get('seeker/melamar/{jobpostId}', [SeekerController::class, 'pelamar'])->name('pelamar.create');
    Route::post('seeker/melamar', [SeekerController::class, 'pelamarStore'])->name('pelamar.store');
    Route::get('seeker/detail/{jobpostId}', [SeekerController::class, 'detailseeker'])->name('seeker.detail');
    Route::get('/seeker/profile/edit/{profileId}', [ProfileController::class, 'editProfile'])->name('seeker.profile.edit');
    Route::put('/seeker/profile/update/{profileId}', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/seeker/job', [SeekerController::class, 'seekerjob'])->name('seeker.job');
    Route::get('/seeker/profile', [SeekerController::class, 'seekerprofile'])->name('seeker.profile');
    Route::post('/seeker/profile/update', [SeekerController::class, 'seekerupdateProfile'])->name('seeker.profile.update');
    Route::get('/seeker/applications', [SeekerController::class, 'applications'])->name('seeker.applications');
    Route::get('/search', [SeekerController::class, 'search'])->name('seeker.search');
});

require __DIR__ . '/auth.php';
