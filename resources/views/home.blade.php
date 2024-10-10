@extends('theme')
@section('content')
    


            <!-- Hero Header Start -->
            <div class="hero-header overflow-hidden px-5">
                <div class="rotate-img">
                    <img src="{{ asset('theme/img/sty-1.png')}}" class="img-fluid w-100" alt="">
                    <div class="rotate-sty-2"></div>
                </div>
                <div class="row gy-5 align-items-center">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                        <h1 class="display-4 text-dark mb-4 wow fadeInUp" data-wow-delay="0.3s">TeachHub</h1>
                        <p class="fs-4 mb-4 wow fadeInUp" data-wow-delay="0.5s">Selamat datang di TeachHub, platform inovatif yang dirancang khusus untuk membantu guru dan lulusan baru dalam meningkatkan keterampilan dan pengetahuan mereka. Di TeachHub, kami memahami tantangan yang dihadapi oleh pendidik dan para pencari kerja di dunia yang terus berubah. Oleh karena itu, kami menyediakan berbagai pelatihan berkualitas yang dapat diakses kapan saja dan di mana saja.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">Get Started</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                        <img src="{{ asset('theme/img/hero-img-1.png')}}" class="img-fluid w-100 h-100" alt="">
                    </div>
                </div>
            </div>
            <!-- Hero Header End -->
        </div>



        <!-- Testimonial Start -->
        <div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h4 class="text-primary">Testimonial</h4>
                    <h1 class="display-5 mb-4">What Our Client Say About Us</h1>
                    <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                    </p>
                </div>
                <div class="testimonial-carousel owl-carousel wow zoomInDown" data-wow-delay="0.2s">
                    <div class="testimonial-item" data-dot="<img class='img-fluid' src='{{ asset('theme/img/testimonial-img-1.jpg') }}' alt=''>">
                        <div class="testimonial-inner text-center p-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <div class="testimonial-inner-img border border-primary border-3 me-4" style="width: 100px; height: 100px; border-radius: 50%;">
                                    <img src="{{ asset('theme/img/testimonial-img-1.jpg')}}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-2">John Abraham</h5>
                                    <p class="mb-0">New York, USA</p>
                                </div>
                            </div>
                            <p class="fs-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores nemo facilis tempora esse explicabo sed! Dignissimos quia ullam pariatur blanditiis sed voluptatum. Totam aut quidem laudantium tempora. Minima, saepe earum!
                            </p>
                            <div class="text-center">
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item" data-dot="<img class='img-fluid' src='img/testimonial-img-2.jpg' alt=''>">
                        <div class="testimonial-inner text-center p-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <div class="testimonial-inner-img border border-primary border-3 me-4" style="width: 100px; height: 100px; border-radius: 50%;">
                                    <img src="{{ asset('theme/img/testimonial-img-2.jpg')}}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-2">John Abraham</h5>
                                    <p class="mb-0">New York, USA</p>
                                </div>
                            </div>
                            <p class="fs-7">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores nemo facilis tempora esse explicabo sed! Dignissimos quia ullam pariatur blanditiis sed voluptatum. Totam aut quidem laudantium tempora. Minima, saepe earum!
                            </p>
                            <div class="text-center">
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item" data-dot="<img class='img-fluid' src='img/testimonial-img-3.jpg' alt=''>">
                        <div class="testimonial-inner text-center p-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <div class="testimonial-inner-img border border-primary border-3 me-4" style="width: 100px; height: 100px; border-radius: 50%;">
                                    <img src="{{ asset('theme/img/testimonial-img-3.jpg')}}" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div>
                                    <h5 class="mb-2">John Abraham</h5>
                                    <p class="mb-0">New York, USA</p>
                                </div>
                            </div>
                            <p class="fs-7">Lorem ipsum ndolor, sit amet consectetur adipisicing elit. Asperiores nemo facilis tempora esse explicabo sed! Dignissimos quia ullam pariatur blanditiis sed voluptatum. Totam aut quidem laudantium tempora. Minima, saepe earum!
                            </p>
                            <div class="text-center">
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        @endsection