@extends('layout.app')

@section('content')
    <h1>Checkout Mapel</h1>
    <p>Mapel: {{ $mapel->judul }}</p>
    <p>Harga: Rp {{ $mapel->formattedHarga }}</p>

    <!-- Tambahkan tombol atau form untuk melakukan pembayaran -->
    <form action="{{ route('mapel.payment.process') }}" method="post">
        @csrf
        <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
        <button type="submit">Bayar Sekarang</button>
    </form>
@endsection