<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'subtitle', 'article', 'date', 'author', 'image'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
