<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <body class="flex bg-gray-100 min-h-screen">


        @include('components.sidebar')

        <div class="flex-grow text-gray-800">
            <header class="flex items-center h-20 px-6 sm:px-10 bg-white">

                <div class="relative w-full max-w-md sm:-ml-2">
                    <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                        class="absolute h-6 w-6 mt-2.5 ml-2 text-gray-400">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" role="search" placeholder="Search..."
                        class="py-2 pl-10 pr-4 w-full border-4 border-transparent placeholder-gray-400 focus:bg-gray-50 rounded-lg" />
                </div>

            </header>
            <main class="p-6 sm:p-10 space-y-2">
                <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                    <div class="mr-6">
                        <h1 class="text-4xl font-semibold mb-2">Data Mapel</h1>
                        <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                    </div>
                </div>
                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <form action="{{ route('mapel.create') }}" method="get">
                        <button
                            class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 rounded-md ml-6 mb-3">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Mapel
                        </button>
                    </form>
                </div>

                <div>
                    <div class="container antialiased mx-auto mt-5">
                        <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        {{-- <th scope="col" class="px-6 py-3">
                                            ID
                                        </th> --}}
                                        <th scope="col" class="px-6 py-3">
                                            JUDUL
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            PRICE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            IMAGE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mapels as $mapel)
                                        <tr class="bg-white border-b hover:bg-gray-50 ">
                                            {{-- <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $mapel->id }}
                                            </th> --}}
                                            <td class="px-6 py-4">
                                                {{ $mapel->judul }}
                                            </td>
                                            <td class="px-6 py-4">
                                                Rp. {{ $mapel->harga }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <img src="{{ asset('/storage/mapels/' . $mapel->image) }}"
                                                    alt="" style="width: 50px">
                                            </td>
                                            <td class="px-6 py-4 text-right flex justify-end">
                                                <form action="{{ route('mapel.edit', ['mapel' => $mapel->id]) }}">
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md mr-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                        </svg>
                                                        Edit
                                                    </button>
                                                </form>
                                                <form action="{{ route('mapel.destroy', ['mapel' => $mapel->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md mr-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-2 flex ">   
                            {{$mapels -> links() }}
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </body>
</body>

</html>
