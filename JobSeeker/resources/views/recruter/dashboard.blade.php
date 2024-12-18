@extends('recruter.main')

@section('content')
<style>
    .card {
        border: none; /* Remove card border */
        border-radius: 8px; /* Slightly rounded edges */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for better depth */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.02); /* Slight enlargement on hover */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); /* Darker shadow on hover */
    }

    .card-img-top {
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        height: 180px; /* Consistent image height */
    }

    .btn-primary {
        background-color: #007BFF;
        border: none;
        padding: 0.5rem 1rem;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Slightly darker blue on hover */
    }

    .rent-price {
        font-size: 1.2rem;
        color: #007BFF; /* Match primary color */
        font-weight: bold;
    }

    .list-unstyled {
        padding: 0;
        list-style: none;
    }

    .list-style-group li {
        padding: 0.5rem 0;
        font-size: 0.9rem;
    }

    .list-style-group li span {
        color: #6c757d; /* Muted text color */
    }

    .list-style-group li span:last-child {
        font-weight: bold;
        color: #343a40; /* Darker text for emphasis */
    }
</style>
<div class="row">
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 justify-content-center">
                @foreach ($jobposts as $jobpost)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ Storage::url($jobpost->gambar) }}"
                                alt="{{ $jobpost->nama_perusahaan }}" />
                            <!-- Product details-->
                            <div class="card-body text-center pt-3">
                                <h5 class="fw-bold">{{ $jobpost->nama_perusahaan }}</h5>
                                <div class="rent-price mb-3">Rp {{ number_format($jobpost->gaji, 0, ',', '.') }}/month</div>
                                <ul class="list-unstyled list-style-group">
                                    <li class="d-flex justify-content-between">
                                        <span>Posisi</span>
                                        <span>{{ $jobpost->posisi }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <span>Tipe Pekerjaan</span>
                                        <span>{{ $jobpost->tipe }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <span>Minimal Pendidikan</span>
                                        <span>{{ $jobpost->pendidikan }}</span>
                                    </li>
                                </ul>
                                <a class="btn btn-sm btn-primary mt-3"
                                    href="{{ route('recruter.detail', ['jobpostId' => $jobpost->id]) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
