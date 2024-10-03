@extends('user.theme')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <ul class="breadcrumb-animation">
        <li></li>
        <li></li>
    </ul>
    <div class="container text-center py-3" style="max-width: 900px;">
        <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Profil Pengguna</h3>
    </div>
</div>
<!-- Header End -->

<!-- Profile Start -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="card shadow-sm">
                <div class="card-body">
                    <img src="{{ asset('path/to/default-avatar.png') }}" alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                    <h5 class="card-title">Nama Lengkap</h5>
                    <p class="card-text">{{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Informasi Profil</h5>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="card-text">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Alamat:</strong>
                        <p class="card-text">{{ Auth::gurus()->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Jenis Kelamin:</strong>
                        <p class="card-text">Laki-laki</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile End -->

@endsection
