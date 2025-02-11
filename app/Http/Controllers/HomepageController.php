<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $posts = Post::where('category_id', '1')
                 ->orderBy('created_at', 'desc')
                 ->take(6)
                 ->get();

        return view('homepage', compact('posts'));
    }
}
