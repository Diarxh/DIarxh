@extends('theme')
@section('content')
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

            {{-- <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">list Pelatihan</a></li>
                        <li class="breadcrumb-item active text-primary"></li>
                    </ol>     --}}
        </div>
    </div>

    <div class="container mt-5">
        <h2>Kontak Kami</h2>
        <ul class="list-group mt-3">
            <li class="list-group-item">
                <a href="https://www.instagram.com/pelita_dev?igsh=enkyeWhra2xrOHR1" class="text-decoration-none text-dark"
                    target="_blank">
                    <a class="btn-square btn btn-primary " href=""><i class="fab fa-instagram"></i></a>
                </a>
            </li>
        </ul>

        <h3 class="mt-5">Lokasi Kami</h3>
        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
            <div class="rounded h-100">
                <iframe class="rounded w-100" style="height: 500px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.327203828082!2d108.11762297587393!3d-6.7298741658035555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ed5eca345f52b%3A0x3a1aed6c68f272f4!2sSMK%20PELITA%20AL-IKHSAN!5e0!3m2!1sen!2sid!4v1728957605292!5m2!1sen!2sid"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />

        <script>
            // Set access token Mapbox Anda
            mapboxgl.accessToken = 'YOUR_MAPBOX_ACCESS_TOKEN';

            const map = new mapboxgl.Map({
                container: 'map', // ID elemen peta
                style: 'mapbox://styles/mapbox/streets-v11', // Gaya peta
                center: [106.8456, -6.2088], // Koordinat Jakarta
                zoom: 12 // Tingkat zoom
            });

            // Tambahkan marker
            const marker = new mapboxgl.Marker()
                .setLngLat([106.8456, -6.2088]) // Koordinat untuk marker
                .addTo(map);
        </script>
    @endsection
