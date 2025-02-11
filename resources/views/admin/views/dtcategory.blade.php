@extends('admin.layouts.app')

@section('title', 'Daftar Data')

@section('content')
    <div x-data="{ showEditModal: false, editCategoryId: null, editCategoryName: '', editCategorySlug: '' }"
         class="p-6 bg-white shadow-md rounded-lg">

        <!-- Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Daftar Data</h3>
            <button @click="showAddModal = true"
                    class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
                + Tambah
            </button>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto">
            <table id="dataTable" class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama Kategori</th>
                        <th class="px-6 py-3 text-left">Slug</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->slug }}</td>
                            <td class="px-6 py-4 text-center">
                                <!-- Tombol Edit -->
                                <button @click="showEditModal = true;
                                                editCategoryId = {{ $category->id }};
                                                editCategoryName = '{{ $category->name }}';
                                                editCategorySlug = '{{ $category->slug }}'"
                                        class="text-blue-600 hover:text-blue-900">
                                    Edit
                                </button>

                                <!-- Tombol Delete -->
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Edit Data -->
        <div x-cloak x-show="showEditModal" x-transition
             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Edit Data</h3>
                <form :action="'{{ url('/kategori/update/') }}/' + editCategoryId" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Nama</label>
                        <input type="text" name="name" x-model="editCategoryName"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Slug</label>
                        <input type="text" name="slug" x-model="editCategorySlug"
                               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button @click="showEditModal = false" type="button"
                                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Tutup</button>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    
@endpush
