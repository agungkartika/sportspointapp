<header class="bg-blue-600 shadow-lg fixed w-full z-10">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-white">SportsPoint</a>

        <div class="flex items-center space-x-4">
            <!-- Search Bar -->
            <div x-data="{ openSearch: false }" class="relative">
                <!-- Search Icon -->
                <button @click="openSearch = !openSearch" class="text-white hover:text-gray-300 focus:outline-none">
                    <i class="fa fa-search"></i>
                </button>

                <!-- Search Input -->
                <div x-show="openSearch"
                     x-transition:enter="transition-transform ease-out duration-300"
                     x-transition:enter-start="translate-x-10 opacity-0"
                     x-transition:enter-end="translate-x-0 opacity-100"
                     x-transition:leave="transition-transform ease-in duration-200"
                     x-transition:leave-start="translate-x-0 opacity-100"
                     x-transition:leave-end="translate-x-10 opacity-0"
                     class="absolute top-0 right-10 bg-white rounded-md shadow-lg p-2 flex items-center w-64">
                    <input type="text" placeholder="Search..."
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button @click="openSearch = false" class="ml-2 text-gray-500 hover:text-gray-700">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div x-data="{ openMenu: false }" class="md:hidden">
                <button @click="openMenu = !openMenu" class="text-white focus:outline-none">
                    <i class="fa fa-bars text-2xl"></i>
                </button>

                <!-- Mobile Navigation -->
                <div x-show="openMenu"
                     x-transition:enter="transition transform ease-out duration-300"
                     x-transition:enter-start="-translate-y-full opacity-0"
                     x-transition:enter-end="translate-y-0 opacity-100"
                     x-transition:leave="transition transform ease-in duration-200"
                     x-transition:leave-start="translate-y-0 opacity-100"
                     x-transition:leave-end="-translate-y-full opacity-0"
                     class="absolute top-16 left-0 w-full bg-white shadow-md md:hidden">
                    <nav class="flex flex-col space-y-4 p-4">
                        <a href="/" class="text-gray-800 hover:bg-gray-200 px-4 py-2 rounded">Home</a>
                        <a href="/artikel" class="text-gray-800 hover:bg-gray-200 px-4 py-2 rounded">Article Blog</a>
                        <a href="/tips" class="text-gray-800 hover:bg-gray-200 px-4 py-2 rounded">Tips'nTricks</a>
                        @if(Auth::check())
                            <a href="{{ route('logout') }}" class="text-gray-800 hover:bg-gray-200 px-4 py-2 rounded"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        @else
                            <a href="/login" class="text-yellow-500 hover:bg-gray-200 px-4 py-2 rounded">Login</a>
                            <a href="/register" class="text-yellow-500 hover:bg-gray-200 px-4 py-2 rounded">Register</a>
                        @endif
                    </nav>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="/" class="text-white hover:text-gray-300">Home</a>
                <a href="/artikel" class="text-white hover:text-gray-300">Article Blog</a>
                <a href="/tips" class="text-white hover:text-gray-300">Tips'nTricks</a>
                @if(Auth::check())
                    <div x-data="{ open: false }" class="relative">
                        <a @click="open = !open" class="text-yellow-400 hover:text-gray-300 cursor-pointer">
                            <i class="fa fa-user"></i> <span class="text-white">{{ Auth::user()->name }}</span>
                        </a>
                        <div x-show="open" @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2">
                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login" class="text-yellow-400 hover:text-gray-300">Login</a>
                    <a href="/register" class="text-yellow-400 hover:text-gray-300">Register</a>
                @endif
            </nav>
        </div>
    </div>
</header>
