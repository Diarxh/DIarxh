@extends('theme')
@section('content')



            <!-- Hero Header Start -->
            <div class="hero-header overflow-hidden px-5">
                <div class="rotate-img">
                    <img src="{{ asset('theme/img/sty-1.png')}}" class="img-fluid w-100" alt="">
                    <div class="rotate-sty-2"></div>
                </div>
                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.5s" style="max-width: 900px;">
                        <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">TeachHub</h1>
                        <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">Selamat datang di TeachHub, platform inovatif yang dirancang khusus untuk membantu guru dan lulusan baru dalam meningkatkan keterampilan dan pengetahuan mereka. Di TeachHub, kami memahami tantangan yang dihadapi oleh pendidik dan para pencari kerja di dunia yang terus berubah. Oleh karena itu, kami menyediakan berbagai pelatihan berkualitas yang dapat diakses kapan saja dan di mana saja.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Get Started</a>
                    </div>
                </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                        <img src="{{ asset('theme/img/hero-img-1.png')}}" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Header End -->


        <!-- Service Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    @foreach ($tipepelatihan as $data)
                        <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item text-center rounded p-4">
                                <div class="service-icon d-inline-block bg-light rounded p-6 mb-6">
                                    @if($data->photo)
                                        <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->trainer_type_name }}" class="img-fluid" style="max-height: 100px;">
                                    @else
                                        <i class="fas fa-mail-bulk fa-5x text-secondary"></i>
                                    @endif
                                </div>
                                <div class="service-content">
                                    <h4 class="mb-4">{{ $data->trainer_type_name }}</h4>
                                    <p class="mb-4">{!! Str::limit($data->trainer_type_description, 100) !!}</p>
                                    <a href="#" class="btn btn-light rounded-pill text-primary py-2 px-4">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Service End -->



        <!-- Testimonial Start -->

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
        <!-- Testimonial End -->
        @endsection
