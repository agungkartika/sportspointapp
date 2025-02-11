@extends('admin.layouts.app')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Tambah Data</h3>
    <form action="{{ route('post.addstore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700">Judul</label>
        <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="slug" class="block text-gray-700">Slug</label>
        <input type="text" name="slug" id="slug" class="w-full px-4 py-2 border rounded-lg" required>
    </div>
    <div class="mb-1">
        <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="category_id">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700">Image</label>
        <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-lg" required>
    </div>
    <div class="mb-4">
        <label for="status" class="block text-gray-700">Status</label>
        <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg" required>
        <option value="0">Draft</option>
        <option value="1">Published</option>
        </select>
    </div>
    <div class="mb-2">
        <label class="block text-sm text-gray-600" for="message">Message</label>
        <textarea id="summernote" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="message" name="content" required="">{{ old('content') }}</textarea>
    </div>
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Tambah</button>
    </div>
    </form>
</div>
@endsection
