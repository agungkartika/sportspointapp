@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Edit Data</h3>
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="title" class="block text-gray-700">Judul</label>
        <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" value="{{ $post->title }}" required>
    </div>
    <div class="mb-4">
        <label for="slug" class="block text-gray-700">Slug</label>
        <input type="text" name="slug" id="slug" class="w-full px-4 py-2 border rounded-lg" value="{{ $post->slug }}" required>
    </div>
    <div class="mb-1">
        <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700">Image</label>
        <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg" onchange="previewImage(event)">
        @if ($post->image)
        <img id="currentImage" src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="mt-2 w-32 h-32 object-cover">
        @endif
        <img id="preview" class="mt-2 w-32 h-32 object-cover hidden">
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.classList.remove('hidden');
                document.getElementById('currentImage').classList.add('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <div class="mb-4">
        <label for="status" class="block text-gray-700">Status</label>
        <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Draft</option>
        <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    <div class="mb-2">
        <label class="block text-sm text-gray-600" for="message">Message</label>
        <textarea id="summernote" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="message" name="content" required>{{ $post->content }}</textarea>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
    </div>
    </form>
</div>
@endsection
