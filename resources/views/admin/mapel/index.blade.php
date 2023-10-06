<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Mapel - Index</title>
</head>

<body>

    <button     
        class=" mt-10 inline-flex px-5 py-3 text-white bg-indigo-500 hover:bg-blue-600 focus:bg-blue-700 duration-200 rounded-md ml-6 mb-3">
        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        <a href="{{route('mapel.create')}}">
            Buat judul mapel
        </a>
    </button>
    

    <div class="container antialiased mx-auto mt-5">
        <div class="relative justify-center items-center overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
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
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $mapel->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $mapel->judul }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ $mapel->harga }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('/storage/mapels/' . $mapel->image) }}" alt=""
                                    style="width: 50px">
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('mapel.edit', ['mapel' => $mapel->id])}}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @empty
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
