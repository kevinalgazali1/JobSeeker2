@extends('seeker.main')

<style>
    .card {
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        background-color: #007BFF;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
        border-radius: 10px 10px 0 0;
        border: none;
        padding: 15px;
    }

    .btn-primary {
        background-color: #007BFF;
        border-color: #007BFF;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-warning {
        background-color: #ffbb33;
        border-color: #ffbb33;
    }

    .btn-warning:hover {
        background-color: #ffa31a;
        border-color: #ffa31a;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
        border: none;
    }

    th {
        background-color: #007BFF;
        color: white;
        text-align: center;
        border: none;
    }

    td, th {
        vertical-align: middle;
        border: none;
        padding: 12px;
    }

    .alert {
        border-radius: 10px;
    }

    .created-by-me {
        background-color: rgba(0, 123, 255, 0.1);
    }

    .table-responsive {
        max-width: 1200px;
        margin: 0 auto;
    }
</style>

@section('content')
<div class="table-responsive">
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Job Post</h3>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Perusahaan</th>
                            <th>Posisi</th>
                            <th>Tipe</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobposts as $jobpost)
                            <tr class="{{ auth()->id() === $jobpost->user_id ? 'created-by-me' : '' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jobpost->nama_perusahaan }}</td>
                                <td>{{ $jobpost->posisi }}</td>
                                <td>{{ ucfirst($jobpost->tipe) }}</td>
                                <td>Rp {{ number_format($jobpost->gaji, 0, ',', '.') }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('pelamar.create', ['jobpostId' => $jobpost->id]) }}">Apply</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('seeker.detail', ['jobpostId' => $jobpost->id]) }}">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
