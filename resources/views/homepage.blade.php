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
    <h2 class="text-3xl font-bold text-center mt-12 text-gray-800">Latest Articles</h2>
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105">
            <img src="{{ asset('storage/' . $post->image) ?? asset($post->image) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $post->title }}</h2>
                <p class="mt-2 text-gray-700">{!! Str::limit($post->content, 100) !!}</p>
                <a href="{{ route('artikel.show', ['slug' => $post->slug]) }}" class="mt-4 inline-block text-blue-600 hover:text-blue-400 font-semibold transition-colors">Read more</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mx-auto px-6 md:px-12 mt-12 text-center">
    <div class="relative w-full h-64 rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('img/banner.png') }}" alt="About Image" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <h2 class="text-3xl font-bold text-white">Tentang Kami</h2>
        </div>
    </div>
    <p class="mt-6 text-gray-700 text-lg md:text-xl">
        Sport Points merupakan sebuah blog yang memberikan informasi terbaru mengenai peralatan olahraga yang sedang hype atau trending. Blog ini mencakup dari berbagai jenis olahraga, mulai dari jenis olahraga fitness, lari, bersepeda, hingga olahraga tim seperti sepak bola dan basket.
    </p>
</div>
@endsection
