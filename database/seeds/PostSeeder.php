<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = config('posts.data');
        foreach ($posts as $post) {
            $_post = new Post();
            $_post->title = $post['title'];
            $_post->subtitle = $post['subtitle'];
            $_post->article = $post['article'];
            $_post->date = $post['date'];
            $_post->author = $post['author'];
            $_post->image = $post['image'];
            $_post->save();
        }
    }
}
