<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Landing Page</title>
</head>

<body class="bg-gray-100">

    <nav class="navbar bg-transparent p-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <a href="#" class="text-gray-900 text-2xl font-bold">LearnWithAzhar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="text-gray-800 py-8 sm:py-12 md:py-16 lg:py-20 px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-12">

            <div class="container mx-auto text-center">
                <div class="text-[#55c097] text-lg font-bold text-left">#SemangatCogg</div>
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl mt-4 sm:mt-6 md:mt-8 font-bold leading-tight text-left">
                    Your Dream Career Starts With Us
                </h1>
                <div class="text-gray-400 text-base sm:text-lg md:text-xl text-left mt-4 sm:mt-6 md:mt-8 xl:w-[25rem]">
                    LearnWithAzhar menyediakan kelas UI/UX design, Prototyping, dan Quiz UI/UX untuk pemula.
                </div>

                <div class="w-full md:w-[16rem] mt-6 sm:mt-8 md:mt-10">
                    <a href="{{ route('login') }}"
                        class="text-left font-bold inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 sm:px-8 rounded-full text-base sm:text-lg md:text-base lg:text-lg xl:text-base transition duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="ml-4 sm:ml-5 text-left font-bold inline-block bg-gray-200 hover:shadow-xl text-gray-900 py-2 px-4 sm:px-6 rounded-full text-base sm:text-lg md:text-base lg:text-lg xl:text-base transition duration-300">
                        Register
                    </a>
                </div>
            </div>

            <div class="hidden md:block">
                <img class="rounded-xl" src="https://i.pinimg.com/736x/8a/ed/3b/8aed3badcde62dcd68780e1be562611c.jpg"
                    alt="">
            </div>

        </div>
    </header>

    <!-- Features Section -->
    <section class="py-12 sm:py-16 md:py-20 lg:py-24">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold">Apa yang Anda Pelajari?</h2>
            <p class="mt-4 text-base sm:text-lg md:text-xl text-gray-600">Pelajari keterampilan yang dibutuhkan untuk
                merancang antarmuka pengguna yang menarik dan efektif.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 mt-8">
                <div class="p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h9" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h3 class="text-xl font-semibold mt-4">Desain Antarmuka Pengguna</h3>
                        <p class="mt-2 text-gray-600">Pelajari prinsip-prinsip desain antarmuka pengguna yang efektif.
                        </p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h3 class="text-xl font-semibold mt-4">Pengalaman Pengguna</h3>
                        <p class="mt-2 text-gray-600">Pahami cara membuat pengalaman pengguna yang menyenangkan.</p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7a3 3 0 013-3h12a3 3 0 013 3v13a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 6a2 2 0 00-2-2a2 2 0 00-2 2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 6a2 2 0 00-2-2a2 2 0 00-2 2" />
                        </svg>
                        <h3 class="text-xl font-semibold mt-4">Prototyping</h3>
                        <p class="mt-2 text-gray-600">Pelajari cara membuat prototipe untuk konsep desain Anda.</p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-blue-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <h3 class="text-xl font-semibold mt-4">Kolaborasi</h3>
                        <p class="mt-2 text-gray-600">Belajar cara berkolaborasi dengan tim pengembangan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-blue-800 text-white py-12 sm:py-16 md:py-20 lg:py-24">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold">Siap Untuk Memulai?</h2>
            <p class="mt-4 text-base sm:text-lg md:text-xl">Gabunglah dalam kursus kami dan tingkatkan keterampilan
                UI/UX Anda!</p>
            <a href="#"
                class="mt-6 sm:mt-8 inline-block bg-white text-blue-800 hover:bg-white hover:text-blue-800 py-3 px-8 sm:py-4 sm:px-10 rounded-full text-lg font-semibold transition duration-300">Daftar
                Sekarang</a>
        </div>
    </section>

    @include('components.footer')

</body>

</html>
