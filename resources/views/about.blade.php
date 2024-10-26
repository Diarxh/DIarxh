@extends('theme')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb position-relative">
        <div class="background-pattern"></div>
        <ul class="breadcrumb-animation">
            @for ($i = 0; $i < 10; $i++)
                <li></li>
            @endfor
        </ul>
        <div class="container text-center py-5">
            <h1 class="display-3 mb-4 text-gradient wow fadeInDown" data-wow-delay="0.1s">About Us</h1>
            <p class="lead wow fadeInUp" data-wow-delay="0.2s">Discover Our Journey in Education</p>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <!-- Image Section -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="position-relative image-wrapper">
                        <div class="about-img-bg"></div>
                        <img src="{{ asset('/images/about.png') }}" class="img-fluid rounded-3 shadow-lg"
                            alt="About TeachHub">
                        <div class="experience-badge">
                            <span class="number">5+</span>
                            <span class="text">Years of Excellence</span>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="about-content">
                        <span class="sub-title">About Us</span>
                        <h2 class="display-5 mb-4">Apa itu TeachHub Academy?</h2>
                        <p class="lead mb-4">TeachHub Academy adalah platform edukasi yang dirancang khusus untuk mendukung
                            pengembangan profesional guru dan lulusan baru.</p>

                        <!-- Features -->
                        <div class="features-grid">
                            <div class="feature-item" data-aos="fade-up">
                                <i class="fas fa-graduation-cap"></i>
                                <h4>Professional Training</h4>
                                <p>Pelatihan berkualitas tinggi</p>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                                <i class="fas fa-laptop-code"></i>
                                <h4>Digital Skills</h4>
                                <p>Microsoft Office & Coding</p>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                                <i class="fas fa-users"></i>
                                <h4>Expert Mentors</h4>
                                <p>Bimbingan profesional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Stats Section -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="stat-card">
                        <i class="fas fa-user-graduate fa-3x mb-3"></i>
                        <h2 class="counter">1000+</h2>
                        <p>Students Trained</p>
                    </div>
                </div>
                <!-- Add more stats cards -->
            </div>
        </div>
    </div>

    <style>
        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(45deg, #007bff, #00ff88);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Image Styling */
        .image-wrapper {
            position: relative;
            z-index: 1;
        }

        .about-img-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #007bff15, #00ff8815);
            transform: rotate(-3deg);
            border-radius: 20px;
            z-index: -1;
        }

        .experience-badge {
            position: absolute;
            right: -20px;
            bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .experience-badge .number {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            display: block;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .feature-item {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-5px);
        }

        .feature-item i {
            color: #007bff;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>

    <script>
        // Counter Animation
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.innerText.replace('+', '');
                const increment = target / 100;

                let count = 0;
                const updateCounter = () => {
                    if (count < target) {
                        count += increment;
                        counter.innerText = Math.ceil(count) + '+';
                        setTimeout(updateCounter, 10);
                    }
                };
                updateCounter();
            });
        });
    </script>
@endsection
