@extends('admin.main')

@section('content')
<style>
    /* Heading style */
    h2 {
        color: #007BFF;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Form labels */
    .form-label {
        font-weight: bold;
        color: #007BFF;
    }

    /* Form inputs and textarea */
    .form-control,
    .form-select {
        border: 1px solid #007BFF;
        border-radius: 5px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0056b3;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.4);
    }

    /* Submit button */
    .btn-primary {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Container styling */
    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container">
    <h2 class="text-center">Job Post Form</h2>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" required>
        </div>

        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi') }}" required>
        </div>

        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan Minimal</label>
            <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <select class="form-select" id="tipe" name="tipe" required>
                <option value="part time">Part Time</option>
                <option value="full time">Full Time</option>
                <option value="freelance">Freelance</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hpemail" class="form-label">Nomor HP/Email</label>
            <input type="text" class="form-control" id="hpemail" name="hpemail" value="{{ old('hpemail') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gaji" class="form-label">Gaji</label>
            <input type="number" class="form-control" id="gaji" name="gaji" value="{{ old('gaji') }}" required>
        </div>

        <div class="text-full-end">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>
</div>
@endsection
