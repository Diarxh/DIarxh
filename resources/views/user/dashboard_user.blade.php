@extends('user.theme')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb py-1">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container py-1 text-center" style="max-width: 500px;">
            <h3 class="display-2 wow fadeInDown mb-1" data-wow-delay="0.1s">Dashboard</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Dashboard Start -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Pelatihan</h5>
                        <p class="card-text">10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pelatihan Saya</h5>
                        <p class="card-text">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pengguna Aktif</h5>
                        <p class="card-text">75</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-3">Recent Activities</h3>
                <table class="table-bordered table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pelatihan JavaScript</td>
                            <td>2024-09-15</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pelatihan PHP</td>
                            <td>2024-09-20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

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
