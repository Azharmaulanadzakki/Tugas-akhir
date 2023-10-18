<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="min-h-screen bg-gray-100">
    <div class="sidebar min-h-screen w-[3.35rem] overflow-hidden border-r hover:w-56 hover:bg-white hover:shadow-lg">
        <div class="flex h-screen flex-col justify-between pt-2 pb-6">
            <div>
                <ul class="mt-6 space-y-2 tracking-wide">
                    <li class="min-w-max">
                        <a href="http://127.0.0.1:8000/admin/dashboard" aria-label="dashboard"
                            class="relative flex items-center space-x-4 px-4 py-3 text-gray-600">
                            <i class="fa-regular fa-user"></i>
                            <span class="-mr-1 font-medium">{{ Auth::user()->name }}</span>
                        </a>
                        <form action="{{route('mapel.index')}}" method="GET">
                            <button class="relative flex items-center space-x-4  px-4 py-3 text-gray-600">
                                <i class="fa-solid fa-database"></i>
                                <span class="-mr-1 font-medium">Data Mapel</span>
                            </button>
                        </form>
                    </li>
                    <li class="min-w-max">
                        <a href="http://127.0.0.1:8000/admin/user">
                            <button class="bg group flex items-center space-x-4 rounded-full px-4 py-3 text-gray-600">
                                <i class="fas fa-user-edit"></i>
                                <span class="group-hover:text-gray-700">Data User</span>
                            </button>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="#" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                    d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Reports</span>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="#" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                    d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                    d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                            <span class="group-hover:text-gray-700">Other data</span>
                        </a>
                    </li>
                    <li class="min-w-max">
                        <a href="#" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path class="fill-current text-gray-300 group-hover:text-cyan-300"
                                    d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path class="fill-current text-gray-600 group-hover:text-cyan-600" fill-rule="evenodd"
                                    d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="group-hover:text-gray-700">Finance</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-max -mb-3">
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  @method('DELETE')
                    <button  class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="group-hover:text-gray-700">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
