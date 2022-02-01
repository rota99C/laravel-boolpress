<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::all();
        return view('guest.index', compact('posts', 'categories', 'tags'));
    }

    public function show(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('guest.show', compact('post', 'categories', 'tags'));
    }
}
