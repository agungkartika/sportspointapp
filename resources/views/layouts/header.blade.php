<header class="bg-blue-600 shadow-lg fixed w-full z-10">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-white">SportsPoint</a>
        <nav class="hidden md:flex space-x-6">
            <a href="/" class="text-white hover:text-gray-300">Home</a>
            <a href="/artikel" class="text-white hover:text-gray-300">Article Blog</a>
            <a href="/tips" class="text-white hover:text-gray-300">Tips'nTricks</a>
            {{-- <a href="#" class="text-white hover:text-gray-300">Contact</a> --}}
            @if(Auth::check())
                <div x-data="{ open: false }" class="relative">
                    <a @click="open = !open" class="text-yellow-400 hover:text-gray-300 cursor-pointer">
                        <i class="fa fa-user"></i> <span class="text-white">{{ Auth::user()->name }}</span>
                    </a>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2">
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
        <button class="md:hidden text-white focus:outline-none" @click="open = !open">
            &#9776;
        </button>
    </div>
</header>
