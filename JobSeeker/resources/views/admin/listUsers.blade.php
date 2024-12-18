@extends('admin.main')

@section('content')
<style>
    .card {
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        background-color: #007BFF;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 10px 15px;
        font-size: 18px;
        font-weight: bold;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #d39e00;
        border-color: #d39e00;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        border: 1px solid #e9ecef;
        padding: 12px;
    }

    .alert {
        border-radius: 10px;
    }

    .created-by-me {
        background-color: rgba(0, 123, 255, 0.1);
    }
</style>

<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>User Management</h3>
    </div>
    <div class="card-body">
        @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="align-middle">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        {{-- Check if the user has the 'admin' role --}}
                        @if($user->role !== 'admin')
                            <tr class="{{ auth()->id() === $user->user_id ? 'created-by-me' : '' }}">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');" class="d-inline" action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
