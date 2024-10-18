@extends('theme')
@section('content')



<!-- Hero Header Start -->
<div class="hero-header overflow-hidden px-5"  data-aos="fade-up" data-aos-delay="300">
    <div class="rotate-img">
        <img src="{{ asset('theme/img/sty-1.png')}}" class="img-fluid w-100" alt="">
        <div class="rotate-sty-2"></div>
    </div>
    <div class="row gy-5 align-items-center">
        <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.4s">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.5s" style="max-width: 900px;">
                <h1 class="display-4 text-dark mb-4">TeachHub</h1>
                <p class="fs-4 mb-4">Selamat datang di TeachHub, platform inovatif yang dirancang khusus untuk membantu guru dan lulusan baru dalam meningkatkan keterampilan dan pengetahuan mereka. Di TeachHub, kami memahami tantangan yang dihadapi oleh pendidik dan para pencari kerja di dunia yang terus berubah. Oleh karena itu, kami menyediakan berbagai pelatihan berkualitas yang dapat diakses kapan saja dan di mana saja.</p>
                <a href="#" class="btn btn-primary rounded-pill py-3 px-5">Get Started</a>
            </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
            <img src="{{ asset('theme/img/hero-img-1.png')}}" class="img-fluid w-100 h-auto" alt="">
        </div>
    </div>
</div>
<!-- Hero Header End -->

<style>
    .hero-header {
        position: relative;
        overflow: hidden;
        padding: 60px 0; /* Menambahkan padding untuk ruang yang lebih baik */
        background-color: #f8f9fa; /* Warna latar belakang yang lebih lembut */
    }

    .rotate-img img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
        z-index: 1;
        opacity: 0.5; /* Menambahkan transparansi untuk efek latar belakang */
    }

    .text-center {
        position: relative;
        z-index: 2; /* Memastikan teks berada di atas gambar */
    }

    .btn-primary {
        transition: background-color 0.3s, transform 0.3s; /* Efek transisi pada tombol */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Warna latar belakang saat hover */
        transform: scale(1.05); /* Efek zoom saat hover */
    }
</style>


<!-- Blog Start -->
<div class="container-fluid FAQ bg-light overflow-hidden py-5"  data-aos="fade-up" data-aos-delay="300">
    <div class="container py-5">
        <div class="wow fadeInUp mx-auto mb-5 text-start" data-wow-delay="0.1s" style="max-width: 900px;">
            <h1 class="display-5 mb-4">List Pelatihan</h1>
            <br>
        </div>
        <div class="service-item row g-4 justify-content-center">
            @foreach ($tipepelatihan as $data)
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item shadow-effect wow fadeInUp" data-wow-delay="0.2s"> <!-- Tambahkan kelas wow di sini -->
                        <div class="blog-img wow fadeInUp" data-wow-delay="0.3s">
                            @if($data->photo)
                                <img src="{{ asset('storage/' . $data->photo) }}"
                                     alt="{{ $data->trainer_type_name }}"
                                     class="img-fluid slightly-rounded-image"
                                     style="max-height: 100%; width: 100%; object-fit: cover;">
                            @else
                                <i class="fas fa-mail-bulk fa-5x text-secondary"></i>
                            @endif
                        </div>
                        <div class="blog-content text-dark border p-4 wow fadeInUp" data-wow-delay="0.4s">
                            <h2 class="mb-4 text-center">{{$data->trainer_type_name }}</h2>
                            <p class="mb-4 text-center">{!! Str::limit($data->trainer_type_description, 100) !!}</p>
                            <a class="btn btn-light rounded-pill px-4 py-2"
                               href="/detail_pelatihan/{{ $data->id }}">Lihat
                               Lebih...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->
        <style>
            .slightly-rounded-image {
                border-radius: 10px; /* Menambahkan sedikit kelengkungan pada gambar */
            }

            .service-item {
                display: flex; /* Menggunakan Flexbox */
                flex-wrap: wrap; /* Membungkus item jika diperlukan */
                justify-content: center; /* Menyelaraskan item di tengah */
            }

            .blog-item {
                display: flex;
                flex-direction: column; /* Mengatur arah kolom untuk item blog */
                height: 100%; /* Memastikan item blog mengambil tinggi penuh */
            }

            .blog-content {
                flex-grow: 1; /* Memungkinkan konten untuk tumbuh dan mengisi ruang yang tersedia */
            }

            .shadow-effect {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Mengatur bayangan */
                transition: transform 0.3s; /* Efek transisi saat hover */
            }

            .shadow-effect:hover {
                transform: translateY(-5px); /* Efek mengangkat saat hover */
            }
        </style>

        <!-- Pricing Start -->
        <div class="container-fluid price py-5" data-aos="fade-up" data-aos-delay="300">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h4 class="text-primary">Paket Berlangganan</h4>
                    <h1 class="display-5 mb-4">Pilih Paket yang Sesuai untuk Anda</h1>
                    <p class="mb-0">Tingkatkan keterampilan mengajar Anda dengan berbagai pilihan paket berlangganan kami. Setiap paket dirancang untuk memenuhi kebutuhan guru modern dalam mengembangkan kompetensi profesional mereka.</p>
                </div>
                <div class="row g-5 justify-content-center">
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="price-item bg-light rounded text-center">
                            <div class="text-center text-dark border-bottom d-flex flex-column justify-content-center p-4" style="height: 160px;">
                                <p class="fs-2 fw-bold text-uppercase mb-0">DASAR</p>
                                <div class="d-flex justify-content-center">
                                    <strong class="align-self-start">Rp</strong>
                                    <p class="mb-0"><span class="display-5">0</span>/bln</p>
                                </div>
                            </div>
                            <div class="text-start p-5">
                                <p><i class="fas fa-check text-success me-1"></i> Akses terbatas ke perpustakaan materi</p>
                                <p><i class="fas fa-check text-success me-1"></i> Dukungan pelanggan dasar</p>
                                <p><i class="fas fa-check text-success me-1"></i> 5 pelatihan gratis per bulan</p>
                                <p><i class="fas fa-times text-danger me-1"></i> Sertifikat pelatihan</p>
                                <p><i class="fas fa-times text-danger me-1"></i> Konsultasi pribadi</p>
                                <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Akses ke webinar eksklusif</p>
                                <a href="#" class="btn btn-primary rounded-pill py-2 px-5">Mulai Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="price-item bg-light rounded text-center">
                            <div class="pice-item-offer">Populer</div>
                            <div class="text-center text-primary border-bottom d-flex flex-column justify-content-center p-4" style="height: 160px;">
                                <p class="fs-2 fw-bold text-uppercase mb-0">PROFESIONAL</p>
                                <div class="d-flex justify-content-center">
                                    <strong class="align-self-start">Rp</strong>
                                    <p class="mb-0"><span class="display-5">199k</span>/bln</p>
                                </div>
                            </div>
                            <div class="text-start p-5">
                                <p><i class="fas fa-check text-success me-1"></i> Akses penuh ke perpustakaan materi</p>
                                <p><i class="fas fa-check text-success me-1"></i> Dukungan pelanggan prioritas</p>
                                <p><i class="fas fa-check text-success me-1"></i> Pelatihan tak terbatas</p>
                                <p><i class="fas fa-check text-success me-1"></i> Sertifikat pelatihan</p>
                                <p><i class="fas fa-check text-success me-1"></i> 2 sesi konsultasi pribadi per bulan</p>
                                <p class="mb-4"><i class="fas fa-check text-success me-1"></i> Akses ke webinar eksklusif</p>
                                <a href="#" class="btn btn-primary rounded-pill py-2 px-5">Mulai Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="price-item bg-light rounded text-center">
                            <div class="text-center text-secondary border-bottom d-flex flex-column justify-content-center p-4" style="height: 160px;">
                                <p class="fs-2 fw-bold text-uppercase mb-0">PREMIUM</p>
                                <div class="d-flex justify-content-center">
                                    <strong class="align-self-start">Rp</strong>
                                    <p class="mb-0"><span class="display-5">399k</span>/bln</p>
                                </div>
                            </div>
                            <div class="text-start p-5">
                                <p><i class="fas fa-check text-success me-1"></i> Semua fitur Profesional</p>
                                <p><i class="fas fa-check text-success me-1"></i> Akses ke materi eksklusif</p>
                                <p><i class="fas fa-check text-success me-1"></i> Pelatihan tatap muka bulanan</p>
                                <p><i class="fas fa-check text-success me-1"></i> Sertifikasi tingkat lanjut</p>
                                <p><i class="fas fa-check text-success me-1"></i> Konsultasi pribadi tak terbatas</p>
                                <p class="mb-4"><i class="fas fa-check text-success me-1"></i> Akses VIP ke semua acara</p>
                                <a href="#" class="btn btn-primary rounded-pill py-2 px-5">Mulai Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing End -->



        {{--  <!-- Testimonial Start -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Testimonial Klien</h2>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">"Layanan yang luar biasa! Sangat membantu bisnis kami tumbuh."</p>
                    <h5 class="card-title">John Doe</h5>
                    <h6 class="card-subtitle mb-2 text-muted">CEO, Perusahaan ABC</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">"Tim yang profesional dan responsif. Saya sangat merekomendasikan mereka."</p>
                    <h5 class="card-title">Jane Smith</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Pengusaha, Perusahaan XYZ</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <p class="card-text">"Kualitas layanan yang sangat baik. Hasilnya melebihi harapan saya!"</p>
                    <h5 class="card-title">Ali Rahman</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Founder, Startup 123</h6>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Testimonial End -->  --}}
        @endsection
