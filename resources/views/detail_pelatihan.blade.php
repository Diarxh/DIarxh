@extends('user.theme')
@section('content')
    <div class="container-fluid bg-breadcrumb py-2">
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
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Detail Pelatihan</h1>
                <ol class="breadcrumb justify-content-center wow fadeInDown mb-0" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>
        </div>
    </div>
    <!-- Header End -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3 wow fadeInLeft" data-wow-delay="0.2s">
                    <img src="{{ asset('theme/img/blog-1.png') }}" alt="Pelatihan Guru" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $detail->name }}</h5>
                        @if($detail->tipe_pelatihan)
                            <p class="card-text">Tipe Pelatihan: {{ $detail->tipe_pelatihan->name }}</p>
                        @else
                            <p class="card-text">Tipe Pelatihan: Tidak tersedia</p>
                        @endif
                        <a href="{{ route('registercourse', $detail->id) }}" class="btn btn-primary">Daftar Pelatihan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="card-body">
                        <h5 class="card-title">Jadwal Pelatihan</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{!! $detail->description !!}</li>
                            <li class="list-group-item">Tanggal:
                                {{ \Carbon\Carbon::parse($detail->start_date)->translatedFormat('l, d F Y') }} -
                                {{ \Carbon\Carbon::parse($detail->end_date)->translatedFormat('l, d F Y') }}</li>
                            <li class="list-group-item">Status: {{ $detail->status }}</li>
                            <li class="list-group-item">Lokasi: {{ $detail->training_location }}</li>
                        </ul>
                    </div>
                </div>
                <div class="participants-section">
                    <h5 class="participants-title">Daftar Peserta</h5>
                    <table class="table-striped table-bordered table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Sekolah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($peserta->isEmpty())
                                <tr>
                                    <td colspan="4">Tidak ada peserta yang terdaftar.</td>
                                </tr>
                            @else
                                @foreach($peserta as $index => $p)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $p->guru ? $p->guru->name : '-' }}</td> <!-- Menggunakan 'name' -->
                                        <td>{{ $p->guru ? $p->guru->email : '-' }}</td> <!-- Menggunakan 'email' -->
                                        <td>{{ $p->guru ? $p->guru->school_name : '-' }}</td> <!-- Menggunakan 'school_name' -->
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
