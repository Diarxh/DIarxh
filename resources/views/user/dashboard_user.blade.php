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

    <!-- Dashboard Start -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-book-open fa-2x text-primary me-3"></i>
                            <h5 class="card-title mb-0">Total Pelatihan</h5>
                        </div>
                        <p class="card-text fs-4 fw-bold">{{ $totalPelatihan }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user-graduate fa-2x text-success me-3"></i>
                            <h5 class="card-title mb-0">Pelatihan Saya</h5>
                        </div>
                        <p class="card-text fs-4 fw-bold">{{ $pelatihanSaya }}</p>
                        <!-- Menampilkan total pelatihan yang diikuti -->
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-users fa-2x text-info me-3"></i>
                            <h5 class="card-title mb-0">Pengguna Aktif</h5>
                        </div>
                        <p class="card-text fs-4 fw-bold">{{ $penggunaAktif }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-3">Pelatihan Terbaru</h3>
            <table class="table-bordered table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelatihan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentPelatihan as $index => $pelatihan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pelatihan->nama }}</td>
                            <td>{{ $pelatihan->tanggal_mulai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Dashboard end -->

    <!-- New Statistics Section -->
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Statistik Peserta per Pelatihan</h5>
                    <canvas id="participantsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Feedback Terbaru</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Pelatihan JavaScript: "Sangat bermanfaat!"</li>
                        <li class="list-group-item">Pelatihan PHP: "Materi sangat jelas."</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Dashboard End -->

    <script>
        var ctx = document.getElementById('participantsChart').getContext('2d');
        var participantsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['JavaScript', 'PHP', 'Python', 'Java'],
                datasets: [{
                    label: '# Peserta',
                    data: [50, 40, 30, 20],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
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
@endsection
