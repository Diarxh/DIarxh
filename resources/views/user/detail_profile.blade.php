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
                    <img src="{{ asset($guru->Foto ?? 'path/to/default-avatar.png') }}" alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                    <h5 class="card-title">Nama Lengkap</h5>
                    <p class="card-text">{{ $guru->Nama }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Informasi Profil</h5>
                    <div class="mb-3">
                        <strong>Nama:</strong>
                        <p class="card-text">{{ $guru->Nama }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <p class="card-text">{{ $guru->Email }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>No. Telepon:</strong>
                        <p class="card-text">{{ $guru->No_Telp }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Nama Sekolah:</strong>
                        <p class="card-text">{{ $guru->Nama_Sekolah }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>NUPTK:</strong>
                        <p class="card-text">{{ $guru->Nuptk }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Foto:</strong>
                        <p class="card-text">{{ $guru->Foto }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal Lahir:</strong>
                        <p class="card-text">{{ $guru->Tanggal_Lahir }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Tempat Lahir:</strong>
                        <p class="card-text">{{ $guru->Tempat_Lahir }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Alamat:</strong>
                        <p class="card-text">{{ $guru->Alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Desa:</strong>
                        <p class="card-text">{{ $guru->Desa }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Kecamatan:</strong>
                        <p class="card-text">{{ $guru->Kecamatan }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Kabupaten:</strong>
                        <p class="card-text">{{ $guru->Kabupaten }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Provinsi:</strong>
                        <p class="card-text">{{ $guru->Provinsi }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Pendidikan Terakhir:</strong>
                        <p class="card-text">{{ $guru->Pendidikan_Terakhir }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>User ID:</strong>
                        <p class="card-text">{{ $guru->User_Id }}</p>
                    </div>
                    <a href="/updateprofile">Edit Profile</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Profile End -->

@endsection
