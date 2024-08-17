<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function list()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.posts.list', compact('posts'));
    }

    public function create()
    {
        return view('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        $post = Post::query()->create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'short' => $request->input('short'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard.posts.list')->with('success', trans('Created'));
    }

    public function edit($id)
    {
        $post = Post::query()->where('id', $id)->first();
        return view('dashboard.posts.edit', ['post' => $post]);
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $requestData = $request->validated();
        Post::query()->where('id', $id)->update($requestData);
        return redirect()->route('dashboard.posts.list')->with('success', trans('Updated'));
    }

    public function destroy($id)
    {
        Post::query()->where('id', $id)->delete();
        return redirect()->route('dashboard.posts.list')->with('success', trans('Removed ').' id: '.$id);
    }

}
