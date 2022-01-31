<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('guest.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        return view('guest.show', compact('post', 'categories'));
    }
}
