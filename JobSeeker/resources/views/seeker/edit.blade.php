@extends('seeker.main')

@section('content')
<style>
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
        <div class="card-header text-center bg-primary text-white">
            <h4>Edit My Profile</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Field formulir dengan tambahan kelas Bootstrap untuk tampilan -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $profile->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $profile->tanggal_lahir }}" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ $profile->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $profile->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profile->alamat }}" required>
                </div>

                <div class="mb-3 d-flex gap-2">
                    <div class="flex-grow-1">
                        <label for="kabkota" class="form-label">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="kabkota" name="kabkota" value="{{ $profile->kabkota }}" required>
                    </div>

                    <div class="flex-grow-1">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $profile->provinsi }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kodepos" class="form-label">Kode Pos</label>
                    <input type="number" class="form-control" id="kodepos" name="kodepos" value="{{ $profile->kodepos }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="hp" class="form-label">Nomor HP</label>
                    <input type="tel" class="form-control" id="hp" name="hp" value="{{ $profile->hp }}" required>
                </div>

                <div class="mb-3">
                    <label for="gambarcv" class="form-label">Upload CV (PDF only)</label>
                    <input type="file" class="form-control" id="gambarcv" name="gambarcv" accept=".pdf">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
