@extends('recruter.main')

@section('content')
<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }

    .card-body {
        padding: 25px;
    }

    .card-title {
        color: #007BFF;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
    }

    .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
        padding: 10px 20px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .text-muted {
        color: #6c757d;
    }

    .container {
        max-width: 600px;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Profil Penyedia Lamaran</h2>
            <form action="{{ route('recruter.profile.update') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <!-- Tombol Simpan -->
                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
