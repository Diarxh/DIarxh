@extends('theme')
@section('content')
    <div class="container-fluid bg-breadcrumb py-3">
        <ul class="breadcrumb-animation">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Detail Pelatihan</h1>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="{{ asset('theme/img/blog-2.png') }}" alt="Pelatihan Guru" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Pelatihan Guru</h5>
                        <p class="card-text">Disini guru akan di ajarkan bagaimana jika ingin mengajarkan ilmu.</p>
                        <p class="card-text">Tipe Pelatihan: Buka</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Pelatihan</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Tanggal: 12-13 Februari 2023</li>
                            <li class="list-group-item">Waktu: 09:00 - 17:00 WIB</li>
                            <li class="list-group-item">Lokasi: Online</li>
                        </ul>
                    </div>
                </div>
                <div class="participants-section">
                    <h5 class="participants-title">Daftar Peserta</h5>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Departemen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td>Marketing</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>janesmith@example.com</td>
                                <td>Sales</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bob Johnson</td>
                                <td>bobjohnson@example.com</td>
                                <td>IT</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
