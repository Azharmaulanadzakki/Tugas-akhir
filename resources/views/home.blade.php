@extends('layout.app')
@section('content')
<style>
    #table-slider {
    display: flex;
    overflow-x: auto;
    padding: 1rem;
}

.slider-card {
    flex: 0 0 auto;
    width: 300px;
    margin-right: 1rem;
}
</style>
    <body class="bg-gray-100 antialiased">

        @include('components.navbar-user')

        <!-- Hero Section -->
        <header class="text-gray-800 py-10 px-4 sm:px-8 md:px-16 lg:px-24 ">

            <div class="grid grid-cols-2">
                <div class="col-span-1 container mx-auto text-center">
                    <div class="text-[#55c097] text-lg font-bold text-left">#DreamComeTrue</div>
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl mt-5 font-bold leading-tight text-left w-[30rem]">
                        Hello {{ Auth::user()->name }}
                    </h1>
                    <div class="text-gray-400 text-lg text-left mt-5 w-[25rem]">LearnWithAzhar menyediakan kelas UI/UX
                        design,
                        Prototyping, dan Quiz UI/UX untuk pemula.
                    </div>
                </div>
            </div>

        </header>

        
        <!-- Features Section -->
        <section class="mx-20">
            
            <div class="container mx-auto py-16 px-4">
                <h1 class="text-4xl font-semibold mb-8 text-center">Discover a most popular Online Course</h1>
                <div class="flex items-center justify-center">
                    <form action="{{ route('home.index') }}" method="GET">
                        <div
                            class="mx-auto relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                            <input type="text" name="search" value="{{ $search }}" placeholder="Search course"
                                class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white">
                            <button type="submit"
                                class="w-full md:w-auto px-6 py-3 bg-black border-black text-white fill-white active:scale-110 duration-300 border will-change-transform overflow-hidden relative rounded-xl transition-all disabled:opacity-70">
    
                                <div class="relative">
    
                                    <!-- Loading animation change opacity to display -->
                                    <div
                                        class="flex items-center justify-center h-3 w-3 absolute inset-1/2 -translate-x-1/2 -translate-y-1/2 transition-all">
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
            
            {{-- untuk card --}}
            <section class="mx-11 my-6"> 
                {{-- grid --}}
                <div class="owl-carousel grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                    {{-- card --}} 
                    @foreach ($mapels as $mapel)
                        <div class="rounded-xl shadow-lg">
                            <div class="rounded-b-none rounded-t-xl overflow-hidden"> <img
                                    src="{{ asset('/storage/mapels/' . $mapel->image) }}" alt="" class="aspect-[1/1]">
                            </div>
                            <div class="p-4 flex flex-col">
                                <h5 class="text-lg md:text-xl font-medium mt-3"> {{ $mapel->judul }}</h5>
                                <h7 class="md:text-xl text-sm"> Rp. {{ $mapel->harga }}</h7>
                                <p class="text-slate-400 text-lg mt-3"> {{ $mapel->description }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            {{-- end card --}}

            
        </section>
    </body>
@endsection
