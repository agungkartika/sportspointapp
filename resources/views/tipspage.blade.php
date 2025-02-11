@extends('layouts.app')

@section('title', 'Tips & Tricks')

@section('content')
<div class="relative w-full h-[500px] flex items-center justify-center text-center bg-cover bg-center rounded-lg shadow-md overflow-hidden" style="background-image: url('{{ asset('img/banner.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center p-6">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white">Welcome to SportsPoint Blog</h1>
        <p class="mt-4 text-gray-200 text-lg md:text-xl">Your daily dose of sports news and updates</p>
    </div>
</div>
<div class="container mx-auto px-6 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tips & Tricks</h2>

    <!-- Category Selection -->
    <div class="mb-8">
        <div class="flex space-x-4">
            <a href="#" class="bg-white rounded-full px-4 py-2 text-blue-600 hover:text-blue-400 font-semibold shadow-md">All</a>
            <a href="#" class="bg-white rounded-full px-4 py-2 text-blue-600 hover:text-blue-400 font-semibold shadow-md">Technology</a>
            <a href="#" class="bg-white rounded-full px-4 py-2 text-blue-600 hover:text-blue-400 font-semibold shadow-md">Health</a>
            <a href="#" class="bg-white rounded-full px-4 py-2 text-blue-600 hover:text-blue-400 font-semibold shadow-md">Lifestyle</a>
        </div>
    </div>

    <!-- Tips & Tricks List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($posts as $post)
        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
            <img src="{{ asset('storage/' . $post->image) ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $post->title }}" class="w-full h-56 object-cover">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $post->title }}</h2>
                <p class="mt-2 text-gray-700">{!! Str::limit($post->content, 100) !!}</p>
                <a href="{{ route('artikel.show', ['slug' => $post->slug]) }}" class="mt-4 inline-block text-blue-600 hover:text-blue-400 font-semibold transition-colors">Read more</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
