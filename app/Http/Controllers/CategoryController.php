<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.views.dtcategory', compact('categories'));
    }
    public function getData()
    {
        $categories = Category::select(['id', 'name', 'slug']);

        return DataTables::of($categories)
            ->addColumn('action', function ($category) {
                return '<button class="px-3 py-1 bg-blue-500 text-white rounded-lg">Edit</button>
                    <button class="px-3 py-1 bg-red-500 text-white rounded-lg">Hapus</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->user_id = auth()->id(); // Add the user_id of the authenticated user
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
