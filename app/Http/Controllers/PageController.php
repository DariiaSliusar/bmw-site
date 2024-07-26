<?php

namespace App\Http\Controllers;

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
        return view('site.posts');
    }
}
