@extends('layout.admin')
@section('content')

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
                        <h1 class="text-4xl font-semibold mb-2">Data Materi</h1>
                        <h2 class="text-gray-600 ml-0.5">Learn With Azhar UI/UX Course</h2>
                    </div>
                </div>
                <div class="flex flex-wrap items-start justify-end -mb-3">
                    <form action="{{ route('materi.create') }}" method="get">
                        <button
                            class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 rounded-md ml-6 mb-3">
                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Create Materi
                        </button>
                    </form>
                </div>

                <div>
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
                                        {{-- <th scope="col" class="px-6 py-3">
                                            ISI
                                        </th> --}}
                                        <th scope="col" class="px-6 py-3">
                                            TAUTAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            IMAGE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            MAPEL PARENT
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($materis as $materi)
                                        <tr class="bg-white border-b hover:bg-gray-50 ">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $materi->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $materi->judul }}
                                            </td>
                                            {{-- <td class="px-6 py-4">
                                                {{ $materi->isi }}
                                            </td> --}}
                                            <td class="px-6 py-4">
                                                {{ $materi->tautan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <img src="{{ asset('/storage/materis/' . $materi->gif) }}" alt=""
                                                    style="width: 50px">
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                {{ optional($materi->mapel)->judul }}
                                            </td>

                                            <td class="px-6 py-4 text-right flex justify-end">

                                                <a href="#" onclick="openDetailModal('{{ $materi->id }}')"
                                                    class="inline-flex items-center px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-medium rounded-md mr-4">
                                                    Detail
                                                </a>
                                                <form action="{{ route('materi.edit', ['materi' => $materi->id]) }}">
                                                    <button
                                                        class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md mr-4">
                                                        Edit
                                                    </button>
                                                </form>

                                                <form action="{{ route('materi.destroy', ['materi' => $materi->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="confirmDelete()"
                                                        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md mr-4">Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        {{-- modal --}}
        @forelse ($materis as $materi)
            <div id="detailModal"
                class="absolute inset-0 z-50 hidden overflow-auto backdrop-blur-sm items-center justify-center">
                <div
                    class="modal-container my-10 bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <!-- Add your detailed content here -->
                    <div class="modal-content py-4 text-left px-6">
                        <!-- Close button -->
                        <div class="flex justify-end items-center">
                            <button id="closeModal" class="text-gray-400 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Detailed content goes here -->
                        <div>
                            <!-- Add your detailed content here -->
                            <!-- For example: -->
                            <h2 class="text-xl font-semibold mb-4">Details for {{ $materi->judul }}</h2>
                            <p class="whitespace-pre-line">{{ $materi->isi }}</p>
                            <!-- Adjust the content according to your needs -->
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        {{-- <script>
            function confirmDelete() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form when the user confirms
                        document.getElementById('deleteForm').submit();
                    }
                });
            }
        </script> --}}

        <script>
            // JavaScript to control the modal
            function openDetailModal(materiId) {
                // Populate modal content dynamically based on materiId if needed

                // Show the modal
                document.getElementById('detailModal').classList.remove('hidden');
            }

            document.getElementById('closeModal').addEventListener('click', function() {
                // Close the modal when the close button is clicked
                document.getElementById('detailModal').classList.add('hidden');
            });
        </script>
    </body>
@endsection
