@extends('user.theme')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb py-2">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container py-6 mt-5 text-center" style="max-width: 1000px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Dashboard</h3>
        </div>
    </div>
    <!-- Header End -->

    @if (!isset($guru))
        {{--  <div class="alert alert-warning" role="alert">
            Data guru belum ada. Silakan tambahkan segera.
        </div>  --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Data Guru Kosong',
                    text: 'Silakan lengkapi data guru Anda untuk melanjutkan.',
                    icon: 'warning',
                    confirmButtonText: 'Isi Data Guru',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Arahkan ke tab Edit Profile
                        window.location.href = "{{ route('profile.show') }}#profile-edit";
                    }
                });

                // Jika URL mengandung #profile-edit, aktifkan tab Edit Profile
                if (window.location.hash === "#profile-edit") {
                    // Gunakan Bootstrap Tab untuk mengaktifkan tab sesuai dengan ID
                    let tab = new bootstrap.Tab(document.querySelector('button[data-bs-target="#profile-edit"]'));
                    tab.show();
                }
            });
        </script>
    @endif

    <!-- Dashboard Content Start -->
    <div class="container my-5">
        <div class="row">
            <!-- Card Total Pelatihan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-book-open fa-3x text-primary mb-3"></i>
                        <h5 class="card-title mb-3">Total Pelatihan</h5>
                        <p class="card-text fs-4 fw-bold">{{ $totalPelatihan }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Pelatihan Saya -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate fa-3x text-success mb-3"></i>
                        <h5 class="card-title mb-3">Pelatihan Saya</h5>
                        <p class="card-text fs-4 fw-bold">{{ $pelatihanSaya }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Pengguna Aktif dengan Avatar -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <img src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" class="rounded-circle"
                            width="50" height="50" alt="Avatar">
                        <h5 class="card-title mb-3">Pengguna Aktif</h5>
                        <p class="card-text fs-4 fw-bold">{{ $penggunaAktif }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pelatihan Terbaru Saya -->
        <div class="container mt-4">
            <h2 class="text-center mb-4">List Pelatihan Terbaru</h2>

            @if ($recentPelatihan->isNotEmpty())
                <div class="row justify-content-center">
                    @foreach ($recentPelatihan as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card shadow-sm border-light">
                                <!-- Gambar Pelatihan -->
                                @if ($item->Training && $item->Training->photo)
                                    <img src="{{ asset('storage/' . $item->Training->photo) }}"
                                        alt="{{ $item->Training->name }}" class="card-img-top" loading="lazy"
                                        style="object-fit: cover; width: 100%; height: 200px;">
                                @else
                                    <div class="placeholder-img">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->Training->name }}</h5>
                                    <p class="card-text"><strong>Tanggal:</strong> {{ $item->Training->start_date }} -
                                        {{ $item->Training->end_date }}</p>
                                    <p class="card-text"><strong>Lokasi:</strong> {{ $item->Training->training_location }}
                                    </p>
                                    <a href="/detail_pelatihan/{{ $item->Training->id }}"
                                        class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Anda belum mengikuti pelatihan apapun.
                </div>
            @endif
        </div>

        <!-- Statistik Pelatihan (Chart.js) -->
        <div class="container my-5">
            <h3 class="text-center mb-4">Statistik Pelatihan</h3>
            <canvas id="trainingStats" width="400" height="200"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('trainingStats').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pelatihan 1', 'Pelatihan 2', 'Pelatihan 3'], // Ganti dengan data dinamis jika perlu
                    datasets: [{
                        label: 'Jumlah Pelatihan',
                        data: [12, 19, 3], // Ganti dengan data dari backend
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <style>
            /* Untuk memastikan card memiliki ukuran yang konsisten */
            .card-img-top {
                object-fit: cover;
                height: 200px;
                /* Sesuaikan dengan kebutuhan */
                width: 100%;
            }

            /* Placeholder untuk gambar jika tidak ada */
            .placeholder-img {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 200px;
                background-color: #f1f1f1;
                color: #ccc;
            }

            /* Efek Hover pada Card */
            .card:hover {
                transform: scale(1.05);
                transition: transform 0.3s ease-in-out;
            }

            /* Untuk memastikan layout responsif */
            @media (max-width: 768px) {
                .col-md-4 {
                    width: 100% !important;
                }
            }
        </style>
    </div>
    <!-- Dashboard Content End -->
@endsection
