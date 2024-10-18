<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>TeachHub Academy</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        {{-- WEB ICON --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon_logo.png') }}">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        <!-- Template Stylesheet -->
        <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        {{--  <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />  --}}

    </head>

    <body>

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <img src="{{ asset('images/logo-cerah.png') }}" alt="Loading..." style="width: 6rem; height: 4rem;">
</div>
<!-- Spinner End -->



        <!-- Navbar & Hero Start -->



        <div class="container-fluid header position-relative p-0">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light px-lg-5 py-lg-0 px-4 py-3">
                <a href="/home" class="navbar-brand p-0">
                    <img src="{{ asset('images/logo-cerah.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        @if (auth()->check() && auth()->user()->hasRole('guru'))
                            <a href="/profile" class="nav-item nav-link">
                                Hello, {{ Auth::user()->name }}
                            </a>
                            <a href="/user/dashboard" class="nav-item nav-link active">Home</a>
                            <a href="/list_pelatihan" class="nav-item nav-link">Pelatihan</a>
                            <a href="/pelatihan_saya" class="nav-item nav-link">Pelatihan Saya</a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 text-white">Logout</button>
                        </form>
                        @else
                            <a href="/home" class="nav-item nav-link active">Home</a>
                            <a href="/list_pelatihan" class="nav-item nav-link">Pelatihan</a>
                            <a href="/tipepelatihan" class="nav-item nav-link">Tipe Pelatihan</a>
                            <a href="/contact" class="nav-item nav-link">Contact Us</a>
                            <a href="/about" class="nav-item nav-link">About</a>

                        </div>
                        <a href="/login" class="btn btn-light border-primary rounded-pill text-primary me-4 border px-4 py-2">Log In</a>
                        <a href="/register" class="btn btn-primary rounded-pill px-4 py-2 text-white">Sign Up</a>

                        @endif
                    </nav>
                </div>

            @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-dark">Quick Links</h4>
                            <a href=""> About Us</a>
                            <a href=""> Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-dark">Contact Info</h4>
                            <a href=""><i class="fa fa-map-marker-alt me-2"></i> Jln Raden Ali Sadikin KM.6 , Ujungjaya,Ujungjaya,Sumedang</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> pelitatefa09@gmail.com</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +62 813 9514 7197</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-secondary me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                class.disar
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
                        <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>TeachHub Academy</a> "Belajar sambil berkarya siap hadapi dunia nyata".</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Tim It PELITA Dev.</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->
<!-- Button trigger modal -->
{{--  <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4" id="loginLink">Sign Up</a>  --}}

<!-- Modal -->
<div class="modal fade custom-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logins  ModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe id="loginIframe" src="" style="width: 100%; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>






        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="'{{ asset('theme/lib/wow/wow.min.js')}}"></script>
    <script src="'{{ asset('theme/lib/easing/easing.min.js')}}"></script>
    <script src="'{{ asset('theme/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="'{{ asset('theme/lib/counterup/counterup.min.js')}}"></script>
    <script src="'{{ asset('theme/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="'{{ asset('theme/lib/lightbox/js/lightbox.min.js')}}"></script>

    <script>
        AOS.init();
      </script>
    <!-- Template Javascript -->
    <script src="{{ asset('theme/js/main.js')}}"></script>
    <!-- MDB -->
    {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.js">  --}}

    {{--  @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById("loginModal");
            var btn = document.getElementById("loginLink");
            var iframe = document.getElementById("loginIframe");

            btn.onclick = function(event) {
                event.preventDefault(); // Mencegah halaman bergulir ke atas
                iframe.src = '/login/login';
                var bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }

            iframe.onload = function() {
                // Tidak perlu resizeIframe karena menggunakan Flexbox
            }

            modal.addEventListener('hidden.bs.modal', function () {
                iframe.src = "";
            });
        });
    </script>
    @endpush  --}}




    </body>

</html>
