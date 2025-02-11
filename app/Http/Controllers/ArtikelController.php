<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class ArtikelController extends Controller
{
    public function detailartikel($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('views');
        $trendingPosts = Cache::remember('trending_posts', now()->addHours(1), function () {
            return Post::orderBy('views', 'desc')->take(5)->get();
        });
        return view('post.detail', compact('post', 'trendingPosts'));
    }
    public function index()
    {
        $posts = Post::where('status', '1')->paginate(10);
        $trendingPosts = Post::orderBy('views', 'desc')->take(5)->get();
        return view('articlepage', compact('posts', 'trendingPosts'));
    }
    public function indextips()
    {
        $posts = Post::where('status', '1')
            ->where('category_id', '2')
            ->get();

        return view('tipspage', compact('posts'));
    }
}
