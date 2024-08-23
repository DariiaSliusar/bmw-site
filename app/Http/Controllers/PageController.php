<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        return view('site.landing');
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
