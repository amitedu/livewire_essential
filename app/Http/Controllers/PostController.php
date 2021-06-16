<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts', ['posts' => $posts]);
    }


    public function show($id)
    {
        return view('post', ['post' => Post::findOrFail($id)]);
    }
}
