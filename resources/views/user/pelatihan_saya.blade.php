@extends('user.theme')

@section('content')

    <div class="container mt-5">
        <h2>Pelatihan Saya</h2>
        @if ($pelatihan->isEmpty())
            <p>Anda belum mendaftar pelatihan apapun.</p>
        @else
            <div class="row">
                @foreach ($pelatihan as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->pelatihan->nama }}</h5>
                                <p class="card-text">Tanggal: {{ $item->pelatihan->start_date }} -
                                    {{ $item->pelatihan->end_date }}</p>
                                <p class="card-text">Lokasi: {{ $item->pelatihan->training_location }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
