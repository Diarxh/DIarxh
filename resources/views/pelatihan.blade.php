@extends('theme')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb py-3">
        <ul class="breadcrumb-animation">
            <!-- ... (kode animasi breadcrumb tetap sama) ... -->
        </ul>
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h1 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Pelatihan</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="wow fadeInUp mx-auto mb-5 text-center" data-wow-delay="0.1s" style="max-width: 900px;">
                <h2 class="display-5 mb-4">List Pelatihan</h2>
            </div>

            <!-- Search Form -->
            <form class="d-flex justify-content-center mb-5">
                <div class="input-group" style="max-width: 500px;">
                    <input class="form-control" type="search" placeholder="Cari pelatihan..." aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <div class="row g-4">
                @foreach ($pelatihan as $data)
                    <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card h-100 shadow-sm">
                            @if ($data->photo)
                                <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->name }}"
                                    class="img-fluid slightly-rounded-image"
                                    style="max-height: 100%; width: 100%; object-fit: cover;">
                            @else
                                <i class="fas fa-mail-bulk fa-5x text-secondary"></i>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $data->name }}</h5>
                                <p class="card-text flex-grow-1">{!! Str::limit($data->description, 100) !!}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <small class="text-muted">
                                        <i class="fa fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($data->start_date)->translatedFormat('d M Y') }}
                                    </small>
                                    <small class="text-muted"><i class="fa fa-user me-1"></i> 100</small>
                                </div>
                                <a href="/detail_pelatihan/{{ $data->id }}" class="btn btn-primary mt-3">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $pelatihan->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>
    <!-- Blog End -->
@endsection

<style>
    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .bg-breadcrumb {
        background-color: #f8f9fa;
    }

    .search-bar {
        max-width: 300px;
        margin: 0 auto;
    }

    @media (max-width: 767px) {
        .display-3 {
            font-size: 2.5rem;
        }

        .display-5 {
            font-size: 1.8rem;
        }
    }
</style>
