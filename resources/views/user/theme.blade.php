<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>TeachHub Academy</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        {{-- WEB ICON --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.svg') }}">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('theme/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        <!-- Template Stylesheet -->
        <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner"
            class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center bg-white">
            <img src="{{ asset('images/logo-cerah.png') }}" alt="Loading..." style="width: 6rem; height: 4rem;">
        </div>
        <!-- Spinner End -->



        <div class="container-fluid header position-relative d:\dad\kanjut\profil.blade.php p-0">
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
                        @if (auth()->check())
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
                <a href="/login"
                    class="btn btn-light border-primary rounded-pill text-primary me-4 border px-4 py-2">Log In</a>
                <a href="/register" class="btn btn-primary rounded-pill px-4 py-2 text-white">Sign Up</a>
                @endif
        </div>



        </nav>
        </div>
        <!-- nav bar end --!>


            @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid footer wow fadeIn py-5" data-wow-delay="0.2s">
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
                            <h4 class="text-dark mb-4">Quick Links</h4>
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
                            <h4 class="text-dark mb-4">Services</h4>
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
                            <h4 class="text-dark mb-4">Contact Info</h4>
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
                    <div class="col-md-6 text-md-start mb-md-0 text-center">
                        <span class="text-white"><a href="#"><i
                                    class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right
                            reserved.</span>
                    </div>
                    <div class="col-md-6 text-md-end text-center text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed
                        By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->
        <!-- Button trigger modal -->
        {{--  <a href="#" class="btn btn-primary rounded-pill text-white py-2 px-4" id="loginLink">Sign Up</a>   --}}

        <!-- Modal -->
        <div class="modal fade custom-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
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
        <script src="'{{ asset('theme/lib/wow/wow.min.js') }}"></script>
        <script src="'{{ asset('theme/lib/easing/easing.min.js') }}"></script>
        <script src="'{{ asset('theme/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="'{{ asset('theme/lib/counterup/counterup.min.js') }}"></script>
        <script src="'{{ asset('theme/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="'{{ asset('theme/lib/lightbox/js/lightbox.min.js') }}"></script>


        <!-- Template Javascript -->
        <script src="{{ asset('theme/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
