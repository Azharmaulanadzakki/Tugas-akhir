<!-- resources/views/materi.blade.php -->

@extends('layout.app')
@section('content')
    <!-- Tampilan konten materi di sini -->
    @include('components.navbar-user')
    @include('components.scroll')

    <body class="antialiased bg-gray-100">

        <main class="text-gray-800 py-10 px-4 sm:px-8 md:px-16">
            {{-- grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class=" col-span-1 container mx-auto text-center">
                    <div class="text-[#55c097] text-lg font-bold text-left">#WujudkanMimpimu</div>
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl mt-5 font-semibold leading-tight text-left sm:w-[30rem]">
                        Hello {{ Auth::user()->name }}
                    </h1>
                    @foreach ($materis as $materi)
                        <h1 class="text-gray-900 font-medium text-2xl text-left mt-10 sm:w-full">
                            Materi : {{ $materi->judul }}.
                        </h1>
                        <div class="relative w-full overflow-hidden md:h-[50dvh] md:w-[50dvh] lg:h-[75dvh] lg:w-[150dvh] mt-5 rounded-lg shadow-xl shadow-gray-400"
                            style="padding-bottom: 56.25%">
                            <iframe src="{{ $materi->tautan }}" frameborder="" allowfullscreen
                                class="absolute top-0 left-0 w-full h-full">
                            </iframe>
                        </div>

                        <div class="flex justify-between mt-8 sm:w-60">
                            @if ($materis->previousPageUrl())
                                <a href="{{ $materis->previousPageUrl() }}">
                                    <button
                                        class="px-5 py-2 bg-indigo-400 transition-colors hover:bg-indigo-600 rounded-lg text-white">
                                        Previous
                                    </button>
                                </a>
                            @else
                                <button
                                    class="px-5 py-2 bg-indigo-400 transition-colors hover:bg-indigo-600 rounded-lg text-white">
                                    Previous
                                </button>
                            @endif

                            @if ($materis->nextPageUrl())
                                <a href="{{ $materis->nextPageUrl() }}">
                                    <button
                                        class="px-8 py-2 bg-indigo-400 transition-colors hover:bg-indigo-600 rounded-lg text-white">
                                        Next
                                    </button>
                                </a>
                            @else
                                <button
                                    class="px-8 py-2 bg-indigo-400 transition-colors hover:bg-indigo-600 rounded-lg text-white">
                                    Next
                                </button>
                            @endif
                        </div>

                        <div class="flex items-start justify-start gap-4 mt-4">
                            <button onclick="scrollToAbout()"
                                class="mt-10 bg-gray-300 rounded-3xl transition-colors focus:bg-gray-900 focus:text-gray-100 focus:outline-none focus:border-none focus:ring-0">
                                <p class="px-14 py-2 font-semibold text-lg">About</p>
                            </button>

                            <button onclick="scrollToTools()"
                                class="mt-10 bg-gray-300 rounded-3xl transition-colors focus:bg-gray-950 focus:text-gray-100 focus:outline-none focus:border-none focus:ring-0">
                                <p class="px-14 py-2 font-semibold text-lg">Tools</p>
                            </button>
                        </div>

                        <p id="about-section"
                            class="whitespace-pre-line antialiased text-gray-600 font-medium text-lg text-left my-2 leading-relaxed tracking-normal">
                            {{ $materi->isi }}
                        </p>
                    @endforeach
                </div>
            </div>

            {{-- end grid --}}

            <button
                class="my-4 bg-gray-300 rounded-3xl transition-colors focus:bg-gray-900 focus:text-gray-100 focus:outline-none focus:border-none focus:ring-0">
                <p class="px-14 py-2 font-semibold text-lg">Tools</p>
            </button>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 my-4">
                @foreach ($tools as $tool)
                    <div id="tool-section" class="rounded-xl shadow-lg mapel-item">
                        <div class="rounded-xl shadow-lg">
                            <div class="rounded-b-none rounded-t-xl overflow-hidden p-10 bg-white">
                                <img src="{{ asset('/storage/tools/' . $tool->image) }}" alt=""
                                    class="aspect-[1/1] w-full h-full">
                            </div>
                            <div class="p-2 sm:p-4 flex flex-col bg-white rounded-b-xl">
                                <h5 class="text-2xl font-semibold"> {{ $tool->nama_tool }}</h5>
                                <p class="text-lg font-medium text-gray-400"> {{ $tool->description }}</p>
                                <a href="{{ $tool->tautan }}">
                                    <button
                                        class="text-white text-base mt-3 px-5 py-2 bg-indigo-400 transition-colors hover:bg-indigo-600 rounded-lg">
                                        Download
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>

        <script>
            // Fungsi untuk melakukan scroll ke elemen dengan ID 'tools-section'
            function scrollToAbout() {
                const aboutSection = document.getElementById('about-section');

                if (aboutSection) {
                    // Gunakan fungsi scrollIntoView untuk melakukan scroll ke elemen tersebut
                    aboutSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }

            function scrollToTools() {
                const toolsSection = document.getElementById('tool-section');

                if (toolsSection) {
                    // Gunakan fungsi scrollIntoView untuk melakukan scroll ke elemen tersebut
                    toolsSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        </script>

    </body>
@endsection
