@extends('layout.app')
@section('content')
    <style>
        /* Tambahkan ini ke stylesheet Anda atau langsung ke tag <style> jika menggunakan file .blade.php */

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <body class="bg-gray-100 min-h-screen font-sans">
        @include('sweetalert::alert')
        <div class="container mx-auto p-4">
            <div class="max-w-2xl mx-auto bg-white p-8 my-8 rounded-md shadow-md">
                <h1 class="text-2xl font-bold mb-4">User Profile</h1>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_image) }}" alt="Profile Picture"
                        class="w-16 h-16 rounded-full object-cover">
                    <div>
                        <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-900 uppercase font-bold">Role : {{ Auth::user()->role }}</p>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-2">Your Information</h3>
                    <ul class="flex items-center space-x-2">
                        <li>
                            <p class="text-gray-900 font-semibold">Role : {{ Auth::user()->role }}</p>
                            <p class="font-semibold text-gray-900">Email : {{ Auth::user()->email }} </p>
                        </li>
                    </ul>
                </div>
                <button id="openModal"
                    class="mt-3 block text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 text-center "
                    type="button" data-modal-toggle="authentication-modal">
                    Edit Profile
                </button>
                <div class="mt-">
                    <!-- Tombol "Back to Home" -->
                    <a href="{{ route('home.index') }}" class="text-blue-500 hover:underline">Back to Home</a>
                </div>
            </div>
        </div>

        <!-- resources/views/auth/profile.blade.php -->


        <!-- The Modal -->
        <div id="myModal" class="modal backdrop-blur">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <!-- Isi formulir update di sini -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                            class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                            class="w-full p-2 border rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="profile_image" class="block text-gray-700 font-bold mb-2">Profile Image:</label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*"
                            class="w-full p-2 border rounded-md" onchange="previewImage(this)">
                        <!-- Pratinjau gambar -->
                        <img id="imagePreview" class="mt-2 rounded-md" style="max-width: 10%;" />
                    </div>

                    <!-- ... (tambahkan bidang lain jika diperlukan) -->

                    <button type="submit" class="bg-gray-800 hover:bg-gray-900 transition-colors text-white p-2 rounded-md">Update Profile</button>
                </form>
            </div>
        </div>

        <script>

            // Ambil elemen-elemen modal
            var modal = document.getElementById('myModal');
            var btn = document.getElementById('openModal');
            var span = document.getElementById('closeModal');

            // Ketika tombol diklik, tampilkan modal
            btn.onclick = function() {
                modal.style.display = 'block';
            }

            // Ketika tombol close diklik, sembunyikan modal
            span.onclick = function() {
                modal.style.display = 'none';
            }

            // Ketika di luar area modal diklik, sembunyikan modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            function previewImage(input) {
                var preview = document.getElementById('imagePreview');
                var file = input.files[0];
                var reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "";
                }
            }

        </script>

    </body>
@endsection
