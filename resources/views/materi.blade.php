<!-- resources/views/materi.blade.php -->

@extends('layout.app')

@section('content')
    <!-- Tampilan konten materi di sini -->
    @include('components.navbar-user')

    <body class="antialiased bg-gray-100">
        <header class="text-gray-800 py-10 px-4 sm:px-8 md:px-16 lg:px-24">
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div class="container mx-auto text-center">
                    <div class="text-[#55c097] text-lg font-bold text-left">#DreamComeTrue</div>
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl mt-5 font-bold leading-tight text-left sm:w-[30rem]">
                        Hello {{ Auth::user()->name }}
                    </h1>
                    @foreach ($materis as $materi)
                        {{-- <img src="{{ asset('storage/materis/' . $materi->gif) }}" alt="Gambar Materi"
                    class="w-44 h-44"> --}}
                        <div class="relative max-w-full w-full md:w-[100rem] overflow-hidden mt-5 rounded-lg shadow-xl shadow-gray-400"
                            style="padding-bottom: 56.25%">
                            <iframe src="{{ $materi->tautan }}" frameborder="" allowfullscreen
                                class="absolute top-0 left-0 w-full h-full">
                            </iframe>
                        </div>
                        <div class="text-gray-900 font-bold text-2xl text-left mt-10 sm:w-full">
                            Disini kita akan mempelajari tentang {{ $materi->judul }}.
                        </div>
                        <div class="text-gray-900 font-semibold text-lg text-left mt-3 sm:w-full">
                            {{ $materi->isi }}.
                        </div>
                    @endforeach
                </div>
            </div>
        </header>
    </body>


    <!-- Tambahkan bagian lain dari tampilan materi sesuai kebutuhan -->
@endsection
