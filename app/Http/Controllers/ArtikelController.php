<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ArtikelController extends Controller
{
    public function detailartikel($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post.detail', compact('post'));
    }
    public function index(){
        $posts = Post::where('status', '1')
                 ->paginate(10);

        return view('articlepage', compact('posts'));
    }
    public function indextips(){
        $posts = Post::where('status', '1')
                 ->where('category_id', '2')
                 ->get();

        return view('tipspage', compact('posts'));
    }
}
