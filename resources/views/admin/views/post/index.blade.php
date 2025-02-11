@extends('admin.layouts.app')

@section('title', 'Post')

@section('content')
    <div class="p-6 bg-white shadow-md rounded-lg" x-data="{ showModal: false, modalContent: '' }">

        <!-- Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Post</h3>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
            <table id="dataTable" class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Judul</th>
                        <th class="px-6 py-3 text-left">Slug</th>
                        <th class="px-6 py-3 text-left">Content</th>
                        <th class="px-6 py-3 text-left">Image</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">{{ $post->slug }}</td>
                            <td class="px-6 py-4">
                                @if (Str::length($post->content) > 100)
                                    {!! Str::limit($post->content, 100) !!}
                                    <button class="text-blue-600 hover:text-blue-900" @click="showModal = true; modalContent = @js($post->content)">Read more</button>
                                @else
                                    {!! $post->content !!}
                                @endif
                            </td>
                            <td class="px-6 py-4"><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                    class="w-16 h-16 object-cover"></td>
                            <td class="px-6 py-4">
                                @if ($post->status == 0)
                                    Draft
                                @else
                                    Published
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('post.edit', $post->id) }}" class="text-blue-600 hover:text-blue-900">
                                    Edit
                                </a>
                                <form action="" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 max-h-[80vh] overflow-y-auto">
                <h2 class="text-lg font-semibold mb-4">Full Content</h2>
                <p x-html="modalContent"></p>
                <button @click="showModal = false" class="mt-4 px-4 py-2 bg-red-600 text-white rounded">Close</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>

@endpush
