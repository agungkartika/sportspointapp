<header class="w-full flex items-center bg-white py-2 px-6 shadow-md">
    <button @click="$dispatch('toggle-sidebar')" class="text-gray-700 p-2 focus:outline-none">
        <i class="fa fa-bars text-xl"></i>
    </button>
    <div class="flex-1"></div>
    <div x-data="{ isOpen: false }" class="relative">
        <button @click="isOpen = !isOpen"
            class="relative z-10 w-10 h-10 rounded-full overflow-hidden border-2 border-gray-400 hover:border-gray-300 focus:outline-none">
            <img src="/path-to-profile.jpg" alt="User Profile">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute right-0 w-48 bg-white rounded-lg shadow-lg py-2 mt-2">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Account</a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Support</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-200">Sign Out</button>
            </form>
        </div>
    </div>
</header>
