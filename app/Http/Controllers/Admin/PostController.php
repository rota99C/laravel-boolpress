<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(4);
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'nullable|max:200',
            'subtitle' => 'nullable|max:300',
            'article' => 'nullable|max:4000',
            'date' => 'nullable',
            'author' => 'nullable|max:70',
            'image' => 'nullable|max:200',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        /* ddd($validate); */
        $post = Post::create($validate);

        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id'
            ]);
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $validate = $request->validate([
            'title' => 'nullable|max:200',
            'subtitle' => 'nullable|max:300',
            'article' => 'nullable|max:4000',
            'date' => 'nullable',
            'author' => 'nullable|max:70',
            'image' => 'nullable|max:200',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        $post->update($validate);
        if ($request->has('tags')) {
            $request->validate([
                'tags' => 'nullable|exists:tags,id'
            ]);
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
