<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function filter(Category $category)
    {
        $posts = $category->posts;
        return view('guest.category', compact('category', 'posts'));
    }
}
