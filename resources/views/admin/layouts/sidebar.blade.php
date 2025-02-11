<aside class="bg-gray-900 text-white h-screen p-4 flex flex-col transition-all duration-300"
    x-data="{ open: window.innerWidth > 768, dropdown: false }"
    x-on:toggle-sidebar.window="open = !open"
    :class="{'w-20': !open, 'w-64': open}" @resize.window="open = window.innerWidth > 768">
    <div class="text-center mb-6" x-show="open">
        <h2 class="text-xl font-semibold">Admin Panel</h2>
    </div>
    <nav class="flex-1">
        <ul>
            <li class="mb-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-gray-700 rounded">
                    <i class="fa fa-home text-lg mr-2"></i>
                    <span x-show="open">Dashboard</span>
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('category.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700 rounded">
                    <i class="fa fa-list text-lg mr-2"></i>
                    <span x-show="open">Kategori</span>
                </a>
            </li>
            <li class="mb-4" x-data="{ dropdown: false }">
                <button @click="dropdown = !dropdown" class="flex items-center px-4 py-2 hover:bg-gray-700 rounded w-full">
                    <i class="fa fa-file-alt text-lg mr-2"></i>
                    <span x-show="open">Post</span>
                    <i class="fa fa-chevron-down ml-auto" x-show="open"></i>
                </button>
                <div x-show="dropdown" class="mt-2 space-y-2" x-cloak>
                    <a href="{{ route('post.index') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">All Posts</a>
                    <a href="{{ route('post.add') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Create Post</a>
                </div>
            </li>
            <li class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 hover:bg-red-600 rounded text-left">
                        <i class="fa fa-sign-out-alt text-lg mr-2"></i>
                        <span x-show="open">Log Out</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
