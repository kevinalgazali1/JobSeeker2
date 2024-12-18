@extends('seeker.main')

@section('content')
<!-- Tambahkan kelas Bootstrap tambahan untuk styling -->
<style>
    .container {
        max-width: 800px;
    }
    .form-label {
        font-weight: bold;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4>Job Application Form</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jobpost_id" value="{{ $jobpost_id }}">

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>

                <!-- Kabupaten/Kota dan Provinsi -->
                <div class="mb-3 d-flex gap-3">
                    <div style="flex: 1;">
                        <label for="kabkota" class="form-label">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="kabkota" name="kabkota" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    </div>
                </div>

                <!-- Kode Pos -->
                <div class="mb-3">
                    <label for="kodepos" class="form-label">Kode Pos</label>
                    <input type="number" class="form-control" id="kodepos" name="kodepos" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Nomor HP -->
                <div class="mb-3">
                    <label for="hp" class="form-label">Nomor HP</label>
                    <input type="tel" class="form-control" id="hp" name="hp" required>
                </div>

                <!-- Upload CV -->
                <div class="mb-3">
                    <label for="gambarcv" class="form-label">Upload CV (PDF only)</label>
                    <input type="file" class="form-control" id="gambarcv" name="gambarcv" accept=".pdf" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
