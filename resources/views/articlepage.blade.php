@extends('layouts.app')

@section('title', 'Daftar Data')

@section('content')
<div class="container mx-auto px-6 py-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Blog List -->
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Latest posts</h2>
            <div class="space-y-6">
            @foreach ($posts as $post)
            <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-4 overflow-hidden transition-transform transform hover:scale-105">
                <img src="{{ asset('storage/' . $post->image) ?? asset($post->image) }}" alt="{{ $post->title }}" class="w-32 h-24 object-cover rounded">
                <div>
                <h3 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h3>
                <p class="text-gray-700">{!! Str::limit($post->content, 80) !!}</p>
                <a href="{{ route('artikel.show', $post->slug) }}" class="text-blue-600 hover:text-blue-400 font-semibold">Read more</a>
                </div>
            </div>
            @endforeach
            </div>
            <div class="mt-6">
            {{ $posts->links() }}
            </div>
        </div>


        <!-- Trending Section -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Trending Now</h2>
            <div class="space-y-4">
                @for ($i = 0; $i < 5; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden p-4 flex items-center gap-4">
                    <img src="{{ asset($post->image) }}" alt="Trending Image" class="w-16 h-16 object-cover rounded">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Trending Title</h3>
                        <a href="#" class="text-blue-600 hover:text-blue-400 font-semibold text-sm">Read more</a>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
