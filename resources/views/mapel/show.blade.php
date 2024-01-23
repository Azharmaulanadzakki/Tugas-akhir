@extends('layout.app') <!-- Sesuaikan dengan layout aplikasi Anda -->

@section('content')
    <div class="container">
        <h1>{{ $mapel->judul }}</h1>
        <p>Description: {{ $mapel->description }}</p>
        <p>Harga: {{ $mapel->formatted_harga }}</p> <!-- Memanggil accessor getFormattedHargaAttribute -->
        <img src="{{ $mapel->image }}" alt="Mapel Image">
        <!-- Tambahkan bagian lain dari tampilan sesuai kebutuhan Anda -->
        @php
            $userHasPaid = $this->userHasPaid($mapel); // Assuming userHasPaid is a method in MapelController
        @endphp

        @if (!$userHasPaid)
            <form action="{{ route('mapel.initiate-payment', ['mapel' => $mapel->id]) }}" method="post">
                @csrf
                <button type="submit">Bayar Sekarang</button>
            </form>
        @else
            <p>Anda sudah membayar untuk akses ini.</p>
        @endif
    </div>
@endsection
