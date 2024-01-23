@extends('layout.app')  <!-- Sesuaikan dengan layout aplikasi Anda -->

@section('content')
    <div class="container">
        <h1>{{ $mapel->judul }}</h1>
        <p>Description: {{ $mapel->description }}</p>
        <p>Harga: {{ $mapel->formatted_harga }}</p> <!-- Memanggil accessor getFormattedHargaAttribute -->
        <img src="{{ $mapel->image }}" alt="Mapel Image">
        <!-- Tambahkan bagian lain dari tampilan sesuai kebutuhan Anda -->
    </div>
@endsection