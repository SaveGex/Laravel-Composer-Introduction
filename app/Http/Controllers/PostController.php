<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all()->load('author');

        return view('pages.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('author');
        return view('pages.posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'is_published' => 'boolean',
        ]);

        $validated['author_id'] = 1;
        $validated['is_published'] = $request->boolean('is_published');

        // генеруємо унікальний slug
        $base = Str::slug($validated['title']);
        $slug = $base;
        $i = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }
        $validated['slug'] = $slug;

        $post = Post::create($validated);

        return redirect()->route('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }


    public function create()
    {
        return view('pages.posts.create');
    }
}
