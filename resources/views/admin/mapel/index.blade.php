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
   
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
            <tr class="bg-white border-b  hover:bg-gray-50 ">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $mapel->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $mapel->judul }}
                </td>
                <td class="px-6 py-4">
                    {{ $mapel->harga }}
                </td>
                <td class="px-6 py-4">
                    <img src="{{ asset('/storage/mapels'.$mapel->image) }}" alt="" style="width: 50px">
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @empty
                
            @endforelse
            
           
        </tbody>
    </table>
</div>

</body>
</html>