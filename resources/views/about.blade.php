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
                <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">About Us</h1>
                <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">About</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


        <!-- About Start -->
        <div class="container-fluid overflow-hidden py-5 mt-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="RotateMoveLeft">
                            <img src="img/about-1.png" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <h4 class="mb-1 text-primary">About Us</h4>
                        <h1 class="display-5 mb-4">Apa itu TeachHub Academy?    </h1>
                        <p class="mb-4">TeachHub Academy adalah platform edukasi yang dirancang khusus untuk mendukung pengembangan profesional guru dan lulusan baru. Kami menyediakan berbagai pelatihan berkualitas yang mencakup pelatihan Microsoft Office, coding, serta keterampilan penting lainnya yang diperlukan di era digital saat ini./.
                        </p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5">About More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

@endsection