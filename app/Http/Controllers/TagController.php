<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function filter(Tag $tag)
    {
        $posts = $tag->posts;
        return view('guest.tag', compact('tag', 'posts'));
    }
}
