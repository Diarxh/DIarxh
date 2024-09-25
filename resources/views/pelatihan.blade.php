@extends('theme')
@section('content')
             <!-- Header Start -->
             <div class="container-fluid bg-breadcrumb">
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
                    <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Pelatihan
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
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h4 class="text-primary">TeachHub</h4>
                    <h1 class="display-5 mb-4">List Pelatihan</h1>
                    <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                    </p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('theme/img/blog-1.png')}}" class="img-fluid w-100" alt="">
                                <div class="blog-info">
                                    <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                    <div class="d-flex">
                                        <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                        <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-dark border p-4 ">
                                <h5 class="mb-4">Pelatihan Guru</h5>
                                <p class="mb-4">Disini guru akan di ajarkan bagaimana jika ingin mengajarkan ilmu.</p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Lihat Lebih...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('theme/img/blog-2.png')}}" class="img-fluid w-100" alt="">
                                <div class="blog-info">
                                    <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                    <div class="d-flex">
                                        <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                        <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-dark border p-4 ">
                                <h5 class="mb-4">Pelatihan Cripto</h5>
                                <p class="mb-4">Disini anda akan di ajarkan bagaimana jika ingin mengajalankan crypto.</p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Lihat Lebih...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('theme/img/blog-3.png')}}" class="img-fluid w-100" alt="">
                                <div class="blog-info">
                                    <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                    <div class="d-flex">
                                        <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                        <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-dark border p-4 ">
                                <h5 class="mb-4">Pelatihan Pengusaha</h5>
                                <p class="mb-4">Disini anda akan di ajarkan bagaimana jika ingin mengajalankan bisnis</p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Lihat Lebih...</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('theme/img/blog-4.png')}}" class="img-fluid w-100" alt="">
                                <div class="blog-info">
                                    <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                    <div class="d-flex">
                                        <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                        <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-dark border p-4 ">
                                <h5 class="mb-4">Pelatihan Copy Writer</h5>
                                <p class="mb-4">Disini anda akan di ajarkan bagaimana jika ingin menjadi seorang copywriter.</p>
                                <a class="btn btn-light rounded-pill py-2 px-4" href="#">Lihat Lebih...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

   



@endsection