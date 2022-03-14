<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function listar()
    {
        $posts = \App\Post::where('published', true)->get();

        foreach ($posts as $post) {
            $post->tags;
            $post->date = $post->created_at->diffForHumans();
        }

        return $posts;
    }

    public function apenas($id)
    {
        $post = \App\Post::find($id);

        $post->tags;

        return response()->json($post);
    }
}
