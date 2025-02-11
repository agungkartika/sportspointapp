@extends('layouts.app')

@section('title', 'Daftar Data')

@section('content')
<div class="relative w-full h-[500px] flex items-center justify-center text-center bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{ asset('img/banner.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center p-6">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white">Welcome to SportsPoint Blog</h1>
        <p class="mt-4 text-gray-200 text-lg md:text-xl">Your daily dose of sports news and updates</p>
    </div>
</div>

<div class="container mx-auto px-6 md:px-12">
    <div class=" shadow-lg rounded-lg overflow-hidden mt-12">
        <img src="{{asset('storage/' . $post->image) ?? 'https://via.placeholder.com/800x400' }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        <div class="p-6">
            <h1 class="text-4xl font-bold text-gray-900">{{ $post->title }}</h1>
            <p class="mt-4 text-gray-600">By <span class="font-semibold">{{ $post->user->name }}</span> | {{ $post->created_at->format('M d, Y') }}</p>
            <div x-data="{ open: false }" class="mt-6 text-gray-800 leading-relaxed">
                <div x-show="!open">
                    {!! Str::limit($post->content, 500) !!}
                    @if (Str::length($post->content) > 500)
                        <div class="mt-4">
                            <button @click="open = true" class="text-blue-600 hover:underline">Read more</button>
                        </div>
                    @endif
                </div>
                <div x-show="open">
                    {!! $post->content !!}
                    <div class="mt-4">
                        <button @click="open = false" class="text-blue-600 hover:underline">Show less</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="text-center mt-8">
        <a href="{{ route('articles.index') }}" class="text-blue-600 hover:underline">← Back to Articles</a>
    </div> --}}
    <!-- Trending Section -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-6 py-5">Trending Now</h2>
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
@endsection
