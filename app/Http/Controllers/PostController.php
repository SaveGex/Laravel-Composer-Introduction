<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->where(function ($query) {
                $query->where('is_published', true)
                    ->orWhere('author_id', Auth::id());
            })
            ->with('author')
            ->get();

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
            'slug' => 'required|string',
        ]);

        $validated['author_id'] = $request->user()->id;
        $validated['is_published'] = $request->boolean('is_published');

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
