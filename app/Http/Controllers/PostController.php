<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Pest\Laravel\post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.views.post.index', compact('posts'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('admin.views.post.add', compact('categories'));
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.views.post.edit', compact('post', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|integer',
            'slug' => 'required|string|unique:posts,slug',
            'status' => 'required|in:0,1', // Pastikan boolean diterima dalam bentuk string
        ]);

        try {
            DB::beginTransaction();

            // Pastikan user sudah login
            if (!Auth::check()) {
                return redirect()->back()->with('error', 'Anda harus login untuk membuat postingan.');
            }

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;

            // Simpan gambar jika ada
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $post->image = $imagePath;
            }

            $post->category_id = $request->category_id;
            $post->user_id = Auth::id(); // Menggunakan Auth::id() lebih aman
            $post->slug = $request->slug;
            $post->status = $request->status;

            $post->save();

            DB::commit();

            return redirect()->back()->with('success', 'Post created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create post: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create post. Periksa log untuk detail.' );
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|integer',
            'slug' => 'required|string|unique:posts,slug,' . $id,
            'status' => 'required|in:0,1',
        ]);

        try {
            DB::beginTransaction();

            $post = Post::findOrFail($id);

            // Update user_id to the current authenticated user
            $post->user_id = Auth::id();

            $post->title = $request->title;
            $post->content = $request->content;

            // Simpan gambar jika ada
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $post->image = $imagePath;
            }

            $post->category_id = $request->category_id;
            $post->slug = $request->slug;
            $post->status = $request->status;

            $post->save();

            DB::commit();

            return redirect(route('post.index'))->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update post: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update post. Periksa log untuk detail.');
        }
    }
}
