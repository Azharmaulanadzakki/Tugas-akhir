@extends('layout.app')
@section('content')

    @include('components.navbar-user')

    <body class="bg-gray-100 antialiased">

        <!-- Hero Section -->
        <header class="text-gray-800 py-10 px-4 sm:px-8 md:px-16 lg:px-24">
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div class="container mx-auto text-center">
                    <div class="text-[#55c097] text-lg font-bold text-left">#DreamComeTrue</div>
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl mt-5 font-bold leading-tight text-left sm:w-[30rem]">
                        Hello {{ Auth::user()->name }}
                    </h1>
                    <p class="text-gray-400 text-lg text-left mt-5 sm:w-[27rem]">
                        Kelas online kami menyediakan kelas UI/UX design, Prototyping, dan ramah untuk designer UI/UX untuk pemula.
                    </p>
                </div>
            </div>
        </header>

        <!-- Features Section -->
        <section class="mx-4 sm:mx-8 md:mx-16 lg:mx-24">

            <div class="container mx-auto py-8 sm:py-16 px-4">
                <h1 class="text-2xl sm:text-4xl font-semibold mb-4 sm:mb-8 text-center">
                    Discover a most popular Online Course
                </h1>
                <div class="flex items-center justify-center">
                    <form action="{{ route('home.index') }}" method="GET">
                        <div
                            class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col sm:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Search course"
                                class="px-4 sm:px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
                            <button type="submit"
                                class="w-full sm:w-auto px-4 sm:px-6 py-3 bg-black border-black text-white fill-white active:scale-110 duration-300 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
                                <div class="relative">
                                    <div
                                        class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
                                        <!-- Loading animation change opacity to display -->
                                        <svg class="opacity-0 animate-spin w-full h-full" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex items-center transition-all opacity-1 valid:"><span
                                            class="text-sm font-semibold whitespace-nowrap truncate mx-auto">
                                            Search
                                        </span>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mx-4 sm:mx-8 my-6">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($mapels as $index => $mapel)
                        <div id="mapel-list-{{ $index }}" class="rounded-xl shadow-lg mapel-item"
                            data-index="{{ $index }}">
                            <div class="rounded-xl shadow-lg">
                                <div class="rounded-b-none rounded-t-xl overflow-hidden">
                                    <img src="{{ asset('/storage/mapels/' . $mapel->image) }}" alt=""
                                        class="aspect-[1/1] w-full h-full">
                                </div>
                                <div class="p-2 sm:p-4 flex flex-col">
                                    <h5 class="text-md font-medium mt-3"> {{ $mapel->judul }}</h5>
                                    <h7 class="text-md font-semibold"> Rp.{{ number_format($mapel->harga, 2, ',', '.') }}
                                    </h7>
                                    {{-- <p class="text-slate-400 text-base mt-3"> {{ $mapel->description }} </p> --}}
                                    <form action="{{ route('materi', ['parent_id' => $mapel->id]) }}">
                                        <button
                                            class="my-3 rounded-md px-4 sm:px-3 py-2 text-sm bg-indigo-500 text-white font-semibold hover:bg-indigo-600 duration-300">
                                            Lihat Kursus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button id="showMoreBtn"
                    class="my-3 rounded-md px-4 sm:px-9 py-2 bg-black text-white font-semibold hover:bg-gray-900 duration-300">
                    Show More
                </button>
                <button id="lessMoreBtn" style="display: none; "
                    class="my-3 rounded-md px-4 sm:px-9 py-2 bg-black text-white font-semibold hover:bg-gray-900 duration-300">
                    Less More
                </button>

            </div>

            @include('components.about')

        </section>
        @include('components.scroll')
        @include('components.infinite-scroll')


        {{-- script show more --}}

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const mapelItems = document.querySelectorAll(".mapel-item");
                const showMoreBtn = document.getElementById("showMoreBtn");
                const lessMoreBtn = document.getElementById("lessMoreBtn");
                const seacrhBtn = document.getElementById("seacrhBtn");

                // Semua elemen dengan indeks lebih besar dari 7 akan disembunyikan
                mapelItems.forEach((item, index) => {
                    if (index > 7) {
                        item.style.display = "none";
                    }
                });

                // Tambahkan event listener pada tombol "Show More"
                showMoreBtn.addEventListener("click", function() {
                    mapelItems.forEach((item, index) => {
                        item.style.display = "block";
                    });
                    // Sembunyikan tombol "Show More" dan tampilkan tombol "Less More"
                    showMoreBtn.style.display = "none";
                    lessMoreBtn.style.display = "block";
                });

                // Tambahkan event listener pada tombol "Less More"
                lessMoreBtn.addEventListener("click", function() {
                    // Semua elemen dengan indeks lebih besar dari 7 akan disembunyikan
                    mapelItems.forEach((item, index) => {
                        if (index > 7) {
                            item.style.display = "none";
                        }
                    });
                    // Tampilkan tombol "Show More" dan sembunyikan tombol "Less More"
                    showMoreBtn.style.display = "block";
                    lessMoreBtn.style.display = "none";
                    seacrhBtn.style.display = "none";
                });

                // Tambahkan event listener pada tombol "Seach"
                seacrhBtn.addEventListener("click", function() {
                    // Tampilkan tombol "Show More" dan sembunyikan tombol "Less More"
                    showMoreBtn.style.display = "block";
                    lessMoreBtn.style.display = "none";
                });
            });
        </script>
    </body>
@endsection
