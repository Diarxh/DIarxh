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
            <h3 class="display-3 wow fadeInDown mb-4" data-wow-delay="0.1s">Contact us
                </h1>
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
            <a href="https://www.instagram.com/pelita_dev?igsh=enkyeWhra2xrOHR1" class="text-decoration-none text-dark" target="_blank">
                <i class="fab fa-instagram fa-lg me-2"></i> Instagram
            </a>
        </li>
    </ul>

    <h3 class="mt-5">Lokasi Kami</h3>
    <div id="map"></div>
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
