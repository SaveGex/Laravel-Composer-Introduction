<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        // return view('posts.index', ['posts' => $posts]);

        return $posts;
    }

    public function show(Post $post)
    {
        return response()->json([
            'success' => true,
            'data'=> $post
        ]);
    }
}
