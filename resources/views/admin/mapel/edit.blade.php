<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit judul</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- component -->
    <section class="max-w-4xl p-6 mx-auto bg-gray-800 rounded-md shadow-md my-5">

        <h1 class="text-xl font-bold text-white capitalize">Create judul form</h1>

        <form action="{{ route('mapel.update', $mapel->id ) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                <div>
                    <label class="text-white" for="judul">Judul Kursus</label>
                    <input id="judul" type="text" name="judul" required
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md  focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="text-white " for="harga">Harga</label>
                    <input id="harga" type="text" name="harga" required
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div>
                    <label class="block text-sm font-medium text-white" for="image">
                        Image
                    </label>
                    <input
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer"
                        name="image" id="image" type="file">
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button
                type="submit"
                class="font-semibold px-6 py-2 leading-5 text-gray-900 transition-colors duration-200 transform bg-white rounded-md hover:bg-gray-300 focus:outline-none focus:bg-gray-300">Create</button>
            </div>

        </form>

    </section>

</body>

</html>
