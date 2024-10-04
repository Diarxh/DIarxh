@extends('user.theme')
@section('content')
<!-- Header Start -->

<div class="container mt-5">
    <h2>Form Input Guru</h2>
    <form action="/saveprofile" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="id" type="text" value="{{ $profile->id }}">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" required value="{{ $profile->Nama }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required value="{{ $profile->Email }}">
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" required value="{{ $profile->No_Telp }}">
        </div>
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" id="nama_sekolah" required value="{{ $profile->Nama_Sekolah }}">
        </div>
        <div class="mb-3">
            <label for="nuptk" class="form-label">NUPTK</label>
            <input type="text" class="form-control" id="nuptk" required value="{{ $profile->Nuptk }}">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" value="{{ $profile->Foto }}">
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" required value="{{ $profile->Tanggal_Lahir }}">
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" required value="{{ $profile->Tempat_Lahir }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" rows="3" required value="{{ $profile->Alamat }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="desa" class="form-label">Desa</label>
            <input type="text" class="form-control" id="desa" required value="{{ $profile->Desa }}">
        </div>
        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" required value="{{ $profile->Kecamatan }}">
        </div>
        <div class="mb-3">
            <label for="kabupaten" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="kabupaten" required value="{{ $profile->Kabupaten }}">
        </div>
        <div class="mb-3">
            <label for="provinsi" class="form-label">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" required value="{{ $profile->Provinsi }}">
        </div>
        <div class="mb-3">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" required value="{{ $profile->Pendidikan_Terakhir }}">
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" value="{{ Auth::user()->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
