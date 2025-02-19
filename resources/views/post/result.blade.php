@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-40">
    <h2 class="text-xl font-bold mb-4">Hasil Pencarian untuk: "{{ $query }}"</h2>

    @if ($posts->isEmpty())
        <p class="text-gray-500">Tidak ada hasil ditemukan.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <div
                class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-4 overflow-hidden transition-transform transform hover:scale-105">
                <img src="{{ asset('storage/' . $post->image) ?? asset($post->image) }}" alt="{{ $post->title }}"
                    class="w-32 h-24 object-cover rounded">
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">{{ $post->title }}</h3>
                    <p class="text-gray-700">{!! Str::limit($post->content, 80) !!}</p>
                    <a href="{{ route('artikel.show', $post->slug) }}"
                        class="text-blue-600 hover:text-blue-400 font-semibold">Read more</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
