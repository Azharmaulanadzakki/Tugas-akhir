@extends('layout.admin')

@section('content')

    <body>
        <!-- component -->
        <section class="max-w-4xl p-6 mx-auto my-5">

            <h1 class="text-xl font-bold text-white capitalize">Create judul form</h1>

            <form action="{{ route('mapel.store') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                    <!-- Judul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                        <input type="text" name="judul" id="judul" class="w-full border rounded-md py-2 px-3"
                            value="{{ old('judul') }}">
                        <!-- Tampilkan pesan kesalahan jika ada -->
                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label for="harga" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                        <input type="number" min="0" name="harga" id="harga"
                            class="w-full border rounded-md py-2 px-3" value="{{ old('harga') }}">
                        <!-- Tampilkan pesan kesalahan jika ada -->
                        @error('harga')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">description</label>
                        <textarea name="description" id="description" class="w-full border rounded-md py-2 px-3" rows="4">{{ old('deskripsi') }}</textarea>
                        <!-- Tampilkan pesan kesalahan jika ada -->
                        @error('deskripsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">image</label>
                        <input type="file" name="image" id="image" class="w-full border rounded-md py-2 px-"
                            onchange="previewImage()">
                        <img id="preview" class="mt-2" style="max-width: 40%;">
                        <!-- Tampilkan pesan kesalahan jika ada -->
                        @error('gambar')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex mt-6 justify-start">
                        <button type="submit"
                            class="ring-2 ring-slate-700 font-semibold px-6 py-2 leading-5 text-gray-900 hover:text-white transition-colors duration-200 transform bg-white rounded-md hover:bg-gray-900 focus:outline-none focus:bg-gray-300">Create</button>
                    </div>
                </div>

            </form>

        </section>

        <script>
            function previewImage() {
                var input = document.getElementById('image');
                var preview = document.getElementById('preview');

                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        </script>
    </body>
@endsection
