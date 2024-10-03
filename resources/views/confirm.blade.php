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
                <h1 class="display-5 mb-4">Confirm Pelatihan</h1>

            </div>
            <div class="row g-4 justify-content-center">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($status == 'terdaftar')
                    <p class="text-center">Anda Sudah Terdaftar</p>
                @else
                    <p class="text-center">Nama Pelatihan : <span>{{ $course->nama }}</span></p>
                    <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">

                        <form action="/registercourse-do" method="POST" class="container mt-4">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="user_id" name="user_id"
                                        value="{{ $user }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="pelatihan_id" name="pelatihan_id"
                                        value="{{ $course->id }}" readonly>
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="check" name="check"
                                    onclick="toggleSubmitButton()">
                                <label class="form-check-label" for="check">Dengan ini menyetujui untuk mendaftar</label>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Daftar</button>
                            </div>

                            <script>
                                function toggleSubmitButton() {
                                    const checkbox = document.getElementById('check');
                                    const submitBtn = document.getElementById('submitBtn');
                                    submitBtn.disabled = !checkbox.checked; // Enable/Disable button based on checkbox state
                                }
                            </script>

                        </form>
                @endif
            </div>
        </div>
    </div>
    </div>
    <!-- Blog End -->
@endsection
