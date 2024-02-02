@extends('layout.app')
@section('content')

    <body class="bg-gray-100 box-border antialiased font-['Poppins']">
        @foreach ($materis as $materi)
            @include('components.navbar-user')
            @include('components.scroll')

            <h1 class="my-14 text-gray-700 font-bold text-center text-3xl">
                Kelas Online <br>
                {{ $materi->judul }}
            </h1>

            <h2 class="text-gray-700 font-medium text-center text-lg">
                <div class="inline-flex justify-center items-center mx-12 space-x-4">
                    <i class="fa-regular fa-globe text-xl"></i>
                    <span class="ml-1">
                        Release date {{ \Carbon\Carbon::parse($materi->created_at)->translatedFormat('F Y') }}
                    </span>
                    <i class="fa-duotone fa-signal-bars text-xl " style="color: #506fff"></i>
                    <span class="ml-1">
                        All levels
                    </span>
                </div>
            </h2>

            <div class="flex justify-between my-20 mx-20">
                <!-- Video Iframe -->
                <div class="w-[50rem] h-[30rem] rounded-3xl shadow-xl shadow-gray-400 bg-gray-200">
                    <iframe src="{{ $materi->tautan }}" title="Youtube Video Player" frameborder="" allowfullscreen
                        class="w-full h-full rounded-3xl">
                    </iframe>
                    <div class="inline-flex justify-end space-x-[27.5rem] mt-8 w-full">
                        @if ($materis->previousPageUrl())
                            <a href="{{ $materis->previousPageUrl() }}">
                                <button
                                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
                                    <i class="fa-regular fa-arrow-left-long"></i>
                                    <span class="mr-2">Previous Lesson</span>
                                </button>
                            </a>
                        @else
                            <button
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800"
                                disabled>
                                <i class="fa-regular fa-arrow-left-long"></i>
                                <span class="mr-2">Previous Lesson</span>
                            </button>
                        @endif

                        @if ($materis->nextPageUrl())
                            <a href="{{ $materis->nextPageUrl() }}">
                                <button
                                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
                                    
                                    <span class="mr-2">Next Lesson</span>
                                    <i class="fa-regular fa-arrow-right-long"></i>
                                </button>
                            </a>
                        @else
                            <button
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800"
                                disabled>
                                <span class="mr-2">Next Lesson</span>
                                <i class="fa-regular fa-arrow-right-long"></i>
                            </button>
                        @endif
                    </div>
                </div>


                <!-- Playlist Section -->
                <div class="w-1/3 ml-4">
                    <section class="bg-white p-4 rounded-2xl shadow">
                        <h2 class="text-lg font-semibold mb-4">Playlist</h2>
                        <ul>
                            @foreach ($materis as $materi)
                                <li class="mb-2"> {{$materi->judul}} </li>
                            @endforeach
                        </ul>
                    </section>
                </div>
            </div>

            <div class="flex items-start justify-start gap-4 mt-4 mx-20">
                <button onclick="scrollToAbout()"
                    class="mt-10 bg-gray-300 rounded-3xl transition-colors focus:bg-gray-900 focus:text-gray-100 focus:outline-none focus:border-none focus:ring-0">
                    <p class="px-14 py-2 font-semibold text-lg">About</p>
                </button>

                <button onclick="scrollToTools()"
                    class="mt-10 bg-gray-300 rounded-3xl transition-colors focus:bg-gray-950 focus:text-gray-100 focus:outline-none focus:border-none focus:ring-0">
                    <p class="px-14 py-2 font-semibold text-lg">Tools</p>
                </button>
            </div>

            <div class="flex items-start justify-start mx-20 w-[40rem] mb-4">
                <p id="about-section"
                    class="whitespace-pre-line antialiased text-gray-600 font-medium text-lg text-left my-2 leading-relaxed tracking-normal">
                    {{ $materi->isi }}
                </p>
            </div>

            <button
                class="my-4 mx-20 bg-gray-300 rounded-3xl transition-colors focus:bg-gray-900 focus:text-gray-100 focus:outline-none focus:border-none focus:ring-0">
                <p class="px-14 py-2 font-semibold text-lg">Tools</p>
            </button>
        @endforeach

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 my-4 mx-20">
            @foreach ($tools as $tool)
                <div id="tool-section" class="rounded-3xl shadow-lg mapel-item">
                    <div class="rounded-3xl shadow-lg bg-white">
                        <div class="rounded-b-none rounded-t-3xl overflow-hidden">
                            <img src="{{ asset('/storage/tools/' . $tool->image) }}" alt=""
                                class="aspect-[1/1] w-full h-52">
                        </div>
                        <div class="p-2 sm:p-4 flex flex-col">
                            <h5 class="text-xl font-bold mt-3 text-gray-900 truncated-text">
                                {{ $tool->nama_tool }}
                            </h5>
                            <h7 class="text-md font-normal text-gray-600">
                                {{ $tool->description }}
                            </h7>
                            <div class="inline-flex space-x-24 ">
                                <a href="{{ $tool->tautan }}">
                                    <button
                                        class="text-white text-base mt-3 px-2 py-2 bg-indigo-400 transition-colors hover:bg-indigo-600 rounded-lg">
                                        <i class="fa-regular fa-circle-dot" style="color: #ffff"></i>
                                        <span>Link here</span>
                                    </button>
                                </a>
                                <div class="flex justify-end items-end space-x-2">
                                    <i class="fa-duotone fa-globe-pointer py-1 text-3xl font-bold" style="color: #506fff;">
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

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
