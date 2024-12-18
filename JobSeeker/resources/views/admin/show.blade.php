@extends('admin.main')

@section('content')
<style>
    /* General styles */
    section {
        background-color: #f8fafc;
        padding: 40px 0;
    }

    .text-center {
        margin-bottom: 30px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .card-body-custom {
        padding: 1.25rem;
    }

    .card-footer {
        padding: 1.25rem;
        border-top: none;
        background-color: #f8fafc;
    }

    .btn-primary {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .fw-bolder {
        font-weight: 600;
    }

    .text-primary {
        color: #007BFF !important;
    }

    .list-unstyled li {
        border-bottom: 1px solid #e0e0e0;
    }

    .rent-price {
        font-size: 1rem;
    }

    /* Custom style for the title */
    .text-center h1 {
        font-size: 2rem;
    }

    /* Style for image */
    .card-img-top {
        width: 300px; /* Set a fixed width */
        height: auto; /* Maintain aspect ratio */
        display: block;
        margin: 0 auto; /* Center horizontally */
    }
</style>

<div class="text-center">
    <h1 class="fw-bolder text-primary">Detail Job</h1>
</div>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ Storage::url($jobpost->gambar) }}" alt="{{ $jobpost->nama_perusahaan }}" />
                    <div class="card-body card-body-custom pt-4">
                        <h3 class="fw-bolder text-primary">Deskripsi</h3>
                        <p>{{ $jobpost->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-5">
                <div class="card">
                    <div class="card-body card-body-custom pt-4">
                        <div class="text-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bolder">{{ $jobpost->nama_perusahaan }}</h5>
                                <div class="rent-price mb-3">
                                    <span class="text-primary">Rp {{ number_format($jobpost->gaji, 0, ',', '.') }}/</span>Month
                                </div>
                            </div>
                            <ul class="list-unstyled">
                                <li class="p-2 d-flex justify-content-between">
                                    <span>Posisi</span>
                                    <span class="fw-bolder">{{ $jobpost->posisi }}</span>
                                </li>
                                <li class="p-2 d-flex justify-content-between">
                                    <span>Pendidikan Minimal</span>
                                    <span class="fw-bolder">{{ $jobpost->pendidikan }}</span>
                                </li>
                                <li class="p-2 d-flex justify-content-between">
                                    <span>Lokasi</span>
                                    <span class="fw-bolder">{{ $jobpost->lokasi }}</span>
                                </li>
                                <li class="p-2 d-flex justify-content-between">
                                    <span>Tipe</span>
                                    <span class="fw-bolder">{{ $jobpost->tipe }}</span>
                                </li>
                                <li class="p-2 d-flex justify-content-between">
                                    <span>Nomor Hp / Email</span>
                                    <span class="fw-bolder">{{ $jobpost->hpemail }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            @if ($jobpost)
                                <a class="btn btn-primary mt-auto btn-sm" href="{{ route('admin') }}">Back</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
