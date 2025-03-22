<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostRepository
{
    public function getAllPosts()
    {
        return Cache::remember('posts', 3600, function () {
            return Post::all();
        });
    }

    public function getPostById($id)
    {
        return Cache::remember("post_{$id}", 3600, function () use ($id) {
            return Post::find($id);
        });
    }
}
