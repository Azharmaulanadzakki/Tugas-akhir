<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="https://i.pinimg.com/564x/9d/22/b9/9d22b9dc4f4eff27b3c1960d61b12e28.jpg" type="image/x-icon">
    <title>Landing Page </title>
</head>

<body class="bg-gray-100">

    @include('components.navbar')

    <!-- Hero Section -->
    <header class="text-gray-800 py-16 px-4 sm:px-8 md:px-16 lg:px-32">

        <div class="grid grid-cols-2">


            <div class="col-span-1 container mx-auto text-center">
                <div class="text-[#55c097] text-lg font-bold text-left">#SemangatCogg</div>
                <h1
                    class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl mt-5 font-bold leading-tight text-left w-[30rem]">
                    Hai user
                </h1>
                <div class="text-gray-400 text-lg text-left mt-5 w-[25rem]">LearnWithAzhar menyediakan kelas UI/UX
                    design,
                    Prototyping, dan Quiz UI/UX untuk pemula.
                </div>

            </div>

            <div class="col-span-1 ">
                <img class="rounded-xl" src="https://i.pinimg.com/736x/8a/ed/3b/8aed3badcde62dcd68780e1be562611c.jpg"
                    alt="">
            </div>

        </div>

    </header>

    <!-- Features Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Apa yang Anda Pelajari?</h2>
            <p class="mt-4 text-lg text-gray-600">Pelajari keterampilan yang dibutuhkan untuk merancang antarmuka
                pengguna yang menarik dan efektif.</p>

            <div class="flex flex-wrap justify-center mt-12">
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-12 h-12 mx-auto text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-12 h-12 mx-auto text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <h3 class="text-xl font-semibold mt-4">Pengalaman Pengguna</h3>
                        <p class="mt-2 text-gray-600">Pahami cara membuat pengalaman pengguna yang menyenangkan.</p>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-12 h-12 mx-auto text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-4">
                    <div class="bg-white rounded-lg p-6">
                        <svg class="w-12 h-12 mx-auto text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
    <section class="bg-blue-800 text-white py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold">Siap Untuk Memulai?</h2>
            <p class="mt-4 text-lg">Gabunglah dalam kursus kami dan tingkatkan keterampilan UI/UX Anda!</p>
            <a href="#"
                class="mt-8 inline-block bg-white text-blue-800 hover:bg-white hover:text-blue-800 py-2 px-6 rounded-full text-lg font-semibold transition duration-300">Daftar
                Sekarang</a>
        </div>
    </section>

    @include('components.footer')

</body>

</html>
