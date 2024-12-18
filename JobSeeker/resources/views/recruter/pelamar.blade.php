@extends('recruter.main')

@section('content')
<style>
    .card {
        margin-top: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-header {
        background-color: #007BFF;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 10px 15px;
        font-size: 18px;
        font-weight: bold;
    }

    .btn-sm {
        margin: 2px;
    }

    .table {
        margin-top: 20px;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-success, .btn-danger, .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
    }

    .btn-success:hover, .btn-danger:hover, .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .text-center {
        color: #666;
        font-style: italic;
    }
</style>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Pelamar</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Hp</th>
                        <th>CV</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profiles as $profile)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $profile->nama }}</td>
                            <td>{{ $profile->jenis_kelamin }}</td>
                            <td>{{ $profile->email }}</td>
                            <td>{{ $profile->hp }}</td>
                            <td>
                                <a href="{{ Storage::url($profile->gambarcv) }}" download>
                                    <button type="button" class="btn btn-primary btn-sm">Download CV</button>
                                </a>
                            </td>
                            <td>
                                @if ($profile->status !== 'disetujui' && $profile->status !== 'ditolak')
                                    <form action="{{ route('recruter.profile.approve', $profile->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                    </form>
                                
                                    <form action="{{ route('recruter.profile.reject', $profile->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                @else
                                    <button class="btn btn-success btn-sm" disabled>Setujui</button>
                                    <button class="btn btn-danger btn-sm" disabled>Tolak</button>
                                @endif
                                
                                <form onclick="return confirm('Apakah anda yakin ingin menghapus profile ini?');" class="d-inline" action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
