<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required|string',
            'author_id' => 'required|integer|exists:users,id',
            'is_published' => 'boolean',
            'slug' => 'required|string|unique:posts,slug'
        ]);

        $post = Post::create($validated);

        return response()->json([
            'success' => true,
            'data' => $post
        ], 201);
    }
}
