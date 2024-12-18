@extends('seeker.main')

@section('content')
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        width: 100%; /* Full width for responsiveness */
        height: 200px; /* Fixed height */
    }

    .card-body-custom {
        padding: 1.25rem;
    }

    .rent-price {
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff; /* Primary color */
    }

    .list-unstyled {
        padding: 0;
        list-style: none;
    }

    .list-style-group li {
        padding: 0.75rem 0;
        font-size: 0.9rem;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #f1f1f1;
    }

    .list-style-group li:last-child {
        border-bottom: none;
    }

    .btn-primary {
        background-color: #007bff; /* Primary color */
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade */
        transform: translateY(-2px);
    }

    .card-footer {
        background-color: transparent;
        border-top: none;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 0.5rem; /* Add spacing between buttons */
    }

    .alert {
        margin-bottom: 1rem;
    }
</style>

<div class="row">
    <section class="py-1">
        <div class="container d-flex justify-content-end">
            <form class="d-flex align-items-center" role="search" action="{{ route('seeker.search') }}" method="GET">
                <select class="form-select me-3 w-100" name="job_type">
                    <option value="">Select Job Type</option>
                    <!-- Tambahkan opsi tipe pekerjaan sesuai kebutuhan -->
                    <option value="Full time">Full-time</option>
                    <option value="Part time">Part-time</option>
                    <option value="freelance">Freelance</option>
                </select>
                <button class="btn btn-outline-primary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>
        </div>
        
        @if (session('message'))
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container px-4 px-lg-5 py-5">
            <div class="row gx-4 justify-content-center">
                @foreach ($jobposts->sortByDesc('gaji')->take(3) as $jobpost)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card h-100 shadow-sm">
                            <!-- Product image -->
                            <img class="card-img-top" src="{{ Storage::url($jobpost->gambar) }}" alt="{{ $jobpost->nama_perusahaan }}">
                            <!-- Product details -->
                            <div class="card-body card-body-custom pt-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $jobpost->nama_perusahaan }}</h5>
                                    <div class="rent-price mb-3">
                                        <span class="text-primary">Rp {{ number_format($jobpost->gaji, 0, ',', '.') }}/</span>month
                                    </div>
                                    <ul class="list-unstyled list-style-group">
                                        <li>
                                            <span>Posisi</span>
                                            <span style="font-weight: 600">{{ $jobpost->posisi }}</span>
                                        </li>
                                        <li>
                                            <span>Tipe Pekerjaan</span>
                                            <span style="font-weight: 600">{{ $jobpost->tipe }}</span>
                                        </li>
                                        <li>
                                            <span>Minimal Pendidikan</span>
                                            <span style="font-weight: 600">{{ $jobpost->pendidikan }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm" href="{{ route('pelamar.create', ['jobpostId' => $jobpost->id]) }}">Apply</a>
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('seeker.detail', ['jobpostId' => $jobpost->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
