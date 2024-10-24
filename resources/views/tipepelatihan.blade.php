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
        <div class="container text-center py-3" style="max-width: 900px;">
            <h3 class="display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Tipe Pelatihan
                </h1>
        </div>
    </div>
    <!-- Header End -->


    <!-- Service Start -->
    <!-- Service Start -->
    <div class="container-fluid FAQ bg-light overflow-hidden py-5" data-aos="fade-up" data-aos-delay="300">
        <div class="container py-5">
            <div class="wow fadeInUp mx-auto mb-5 text-start" data-wow-delay="0.1s" style="max-width: 900px;">
                <ol>
                    <h1 class="display-5 mb-4 text-start">Berikut List</h1>
                </ol>
                <br>
            </div>
            <div class="service-item row g-4 justify-content-center">
                @foreach ($tipepelatihan as $data)
                    <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="blog-item shadow-effect wow fadeInUp" data-wow-delay="0.2s">
                            <!-- Tambahkan kelas wow di sini -->
                            <div class="blog-img wow fadeInUp" data-wow-delay="0.3s">
                                @if ($data->photo)
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $data->trainer_type_name }}"
                                        class="img-fluid slightly-rounded-image"
                                        style="max-height: 100%; width: 100%; object-fit: cover;">
                                @else
                                    <i class="fas fa-mail-bulk fa-5x text-secondary"></i>
                                @endif
                            </div>
                            <div class="blog-content text-dark border p-4 wow fadeInUp" data-wow-delay="0.4s">
                                <h2 class="mb-4 text-center">{{ $data->trainer_type_name }}</h2>
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
    <!-- Service End -->
    <!-- Blog End -->
    <style>
        .slightly-rounded-image {
            border-radius: 10px;
            /* Menambahkan sedikit kelengkungan pada gambar */
        }

        .service-item {
            display: flex;
            /* Menggunakan Flexbox */
            flex-wrap: wrap;
            /* Membungkus item jika diperlukan */
            justify-content: center;
            /* Menyelaraskan item di tengah */
        }

        .blog-item {
            display: flex;
            flex-direction: column;
            /* Mengatur arah kolom untuk item blog */
            height: 100%;
            /* Memastikan item blog mengambil tinggi penuh */
        }

        .blog-content {
            flex-grow: 1;
            /* Memungkinkan konten untuk tumbuh dan mengisi ruang yang tersedia */
        }

        .shadow-effect {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            /* Mengatur bayangan */
            transition: transform 0.3s;
            /* Efek transisi saat hover */
        }

        .shadow-effect:hover {
            transform: translateY(-5px);
            /* Efek mengangkat saat hover */
        }
    </style>

    <!-- FAQ Start -->
    <div class="container-fluid FAQ bg-light overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item border-0 mb-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button rounded-top" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseTOne">
                                    Why did you choose Our Email Services?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body my-2">
                                    <h5>Dolor sit amet consectetur adipisicing elit.</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nemo impedit, sapiente
                                        quis illo quia nulla atque maxime fuga minima ipsa quae cum consequatur, sit,
                                        delectus exercitationem odit officiis maiores! Neque, quidem corrupti modi
                                        architecto eos saepe incidunt dignissimos rerum.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta distinctio hic fuga
                                        odio excepturi ducimus sequi at. Doloribus, non aspernatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="FAQ-img RotateMoveRight rounded">
                        <img src="img/about-1.png" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->


    <!-- Pricing Start -->
    <div class="container-fluid price py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                <h4 class="text-primary">Pricing Plan</h4>
                <h1 class="display-5 mb-4">Not Sure Which Plan Is For You?</h1>
                <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet
                    doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores
                    vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                </p>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="price-item bg-light rounded text-center">
                        <div class="text-center text-dark border-bottom d-flex flex-column justify-content-center p-4"
                            style="width: 100%; height: 160px;">
                            <p class="fs-2 fw-bold text-uppercase mb-0">BASIC</p>
                            <div class="d-flex justify-content-center">
                                <strong class="align-self-start">$</strong>
                                <p class="mb-0"><span class="display-5">00</span>/mo</p>
                            </div>
                        </div>
                        <div class="text-start p-5">
                            <p><i class="fas fa-check text-success me-1"></i> Limited Acess Library</p>
                            <p><i class="fas fa-check text-success me-1"></i> Customer Support</p>
                            <p><i class="fas fa-check text-success me-1"></i> Pre-built Email Templates</p>
                            <p><i class="fas fa-check text-success me-1"></i> Reporting & Analytics</p>
                            <p><i class="fas fa-check text-success me-1"></i> Forms & Landing Pages</p>
                            <p><i class="fas fa-check text-success me-1"></i> A/B Testing</p>
                            <p><i class="fas fa-check text-success me-1"></i> Email Scheduling</p>
                            <p><i class="fas fa-check text-success me-1"></i> Automated Customer Journeys</p>
                            <p><i class="fas fa-times text-danger me-1"></i> Creative Assistant</p>
                            <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Role-based Access</p>
                            <button class="btn btn-light rounded-pill py-2 px-5" type="button">Get Started</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="price-item bg-light rounded text-center">
                        <div class="pice-item-offer">Popular</div>
                        <div class="text-center text-primary border-bottom d-flex flex-column justify-content-center p-4"
                            style="width: 100%; height: 160px;">
                            <p class="fs-2 fw-bold text-uppercase mb-0">Standard</p>
                            <div class="d-flex justify-content-center">
                                <strong class="align-self-start">$</strong>
                                <p class="mb-0"><span class="display-5">23</span>/mo</p>
                            </div>
                        </div>
                        <div class="text-start p-5">
                            <p><i class="fas fa-check text-success me-1"></i> Limited Acess Library</p>
                            <p><i class="fas fa-check text-success me-1"></i> Customer Support</p>
                            <p><i class="fas fa-check text-success me-1"></i> Pre-built Email Templates</p>
                            <p><i class="fas fa-check text-success me-1"></i> Reporting & Analytics</p>
                            <p><i class="fas fa-check text-success me-1"></i> Forms & Landing Pages</p>
                            <p><i class="fas fa-check text-success me-1"></i> A/B Testing</p>
                            <p><i class="fas fa-check text-success me-1"></i> Email Scheduling</p>
                            <p><i class="fas fa-check text-success me-1"></i> Automated Customer Journeys</p>
                            <p><i class="fas fa-times text-danger me-1"></i> Creative Assistant</p>
                            <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Role-based Access</p>
                            <button class="btn btn-light rounded-pill py-2 px-5" type="button">Get Started</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="price-item bg-light rounded text-center">
                        <div class="text-center text-secondary border-bottom d-flex flex-column justify-content-center p-4"
                            style="width: 100%; height: 160px;">
                            <p class="fs-2 fw-bold text-uppercase mb-0">Premium</p>
                            <div class="d-flex justify-content-center">
                                <strong class="align-self-start">$</strong>
                                <p class="mb-0"><span class="display-5">49</span>/mo</p>
                            </div>
                        </div>
                        <div class="text-start p-5">
                            <p><i class="fas fa-check text-success me-1"></i> Limited Acess Library</p>
                            <p><i class="fas fa-check text-success me-1"></i> Customer Support</p>
                            <p><i class="fas fa-check text-success me-1"></i> Pre-built Email Templates</p>
                            <p><i class="fas fa-check text-success me-1"></i> Reporting & Analytics</p>
                            <p><i class="fas fa-check text-success me-1"></i> Forms & Landing Pages</p>
                            <p><i class="fas fa-check text-success me-1"></i> A/B Testing</p>
                            <p><i class="fas fa-check text-success me-1"></i> Email Scheduling</p>
                            <p><i class="fas fa-check text-success me-1"></i> Automated Customer Journeys</p>
                            <p><i class="fas fa-times text-danger me-1"></i> Creative Assistant</p>
                            <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Role-based Access</p>
                            <button class="btn btn-light rounded-pill py-2 px-5" type="button">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->


    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-dark mb-4">Company</h4>
                        <a href=""> Why Mailler?</a>
                        <a href=""> Our Features</a>
                        <a href=""> Our Portfolio</a>
                        <a href=""> About Us</a>
                        <a href=""> Our Blog & News</a>
                        <a href=""> Get In Touch</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Quick Links</h4>
                        <a href=""> About Us</a>
                        <a href=""> Contact Us</a>
                        <a href=""> Privacy Policy</a>
                        <a href=""> Terms & Conditions</a>
                        <a href=""> Our Blog & News</a>
                        <a href=""> Our Team</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Services</h4>
                        <a href=""> All Services</a>
                        <a href=""> Promotional Emails</a>
                        <a href=""> Product Updates</a>
                        <a href=""> Email Marketing</a>
                        <a href=""> Acquistion Emails</a>
                        <a href=""> Retention Emails</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="mb-4 text-dark">Contact Info</h4>
                        <a href=""><i class="fa fa-map-marker-alt me-2"></i> 123 Street, New York, USA</a>
                        <a href=""><i class="fas fa-envelope me-2"></i> info@example.com</a>
                        <a href=""><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                        <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-share fa-2x text-secondary me-2"></i>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site
                            Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a
                        class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
@endsection
