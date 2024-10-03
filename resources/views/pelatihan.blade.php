@extends('user.theme')
@section('content')
    <!-- Header Start -->
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
        <div class="container py-5 text-center" style="max-width: 900px;">
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Pelatihan
                </h1>
                {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">list Pelatihan</a></li>
                        <li class="breadcrumb-item active text-primary"></li>
                    </ol>     --}}
        </div>
    </div>
    <!-- Header End -->



    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="wow fadeInUp mx-auto mb-5 text-center" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary">TeachHub</h4>
                <h1 class="display-5 mb-4">List Pelatihan</h1>

            </div>
            <div class="row g-4 justify-content-center">

                @foreach ($pelatihan as $data)
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('theme/img/blog-1.png') }}" class="img-fluid w-100" alt="">
                                <div class="blog-info">
                                    <span><i class="fa fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($data->tanggal_mulai)->translatedFormat('l, d F Y') }}</span>
                                    <div class="d-flex">

                                        <a href="#" class="text-white">100 <i class="fa fa-user"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-dark border p-4">
                                <h5 class="mb-4">{{ $data->nama }}</h5>
                                <p class="mb-4">{!! substr($data->deskripsi, 0, 100) !!}</p>
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
@endsection
