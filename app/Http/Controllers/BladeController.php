<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function directives()
    {
        $input = '<script>alert("HOHOHO")</script>';
        $post = Post::find(3);
        $posts = Post::all();

        return view('intro.directives', compact('post', 'input', 'posts'));
    }

    public function inheritance()
    {
        return view('pages.about');
    }
}
