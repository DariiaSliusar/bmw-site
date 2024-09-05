<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->limit(3)->get();

        return view('site.landing', compact('posts'));
    }

    public function contacts()
    {
        return view('site.contacts');
    }


    public function posts()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('site.posts', compact('posts'));
    }
}
