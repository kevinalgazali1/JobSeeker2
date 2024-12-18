@extends('seeker.main')

@section('content')
<!-- Tambahkan styling tambahan dengan Bootstrap untuk keindahan tampilan -->
<style>
    .container {
        max-width: 1000px;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }

    .card {
        border: none;
        border-radius: 0.5rem;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .card-header {
        background-color: #6c63ff;
        color: #fff;
    }

    .badge-status {
        font-size: 0.9rem;
    }
</style>

<div class="container">
    <div class="card shadow">
        <div class="card-header text-center">
            <h4>My Job Applications</h4>
        </div>
        <div class="card-body text-center">
            @if (session('message'))
                <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($applications->isEmpty())
                <p class="text-center">You haven't applied for any jobs yet.</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->jobpost->nama_perusahaan }}</td>
                                <td>{{ $application->jobpost->posisi }}</td>
                                <td>{{ $application->jobpost->tipe }}</td>
                                <td>
                                    <span class="badge bg-{{ $application->status == 'diterima' ? 'success' : ($application->status == 'menunggu' ? 'warning' : 'danger') }} badge-status">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('seeker.profile.edit', $application->id) }}"
                                       class="btn btn-warning btn-sm @if ($application->status !== 'menunggu') disabled @endif"
                                       aria-disabled="{{ $application->status !== 'menunggu' ? 'true' : 'false' }}">
                                       Edit Profile
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
