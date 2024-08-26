<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use File;
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
        $thumbnail = $request->file('thumbnail');
        $path = $thumbnail->store('thumbnails', 'public');

        $post = Post::query()->create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'short' => $request->input('short'),
            'content' => $request->input('content'),
            'thumbnail' => $path,
        ]);

        return redirect()->route('dashboard.posts.edit', $post->id)->with('success', trans('Created'));
    }

    public function edit($id)
    {
        $post = Post::query()->where('id', $id)->first();
        return view('dashboard.posts.edit', ['post' => $post]);
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $requestData = $request->validated();
        $post = Post::query()->where('id', $id)->first();

        if($request->hasFile('thumbnail')){
            $path = $request->file('thumbnail')->store('thumbnails', 'public');

            if ($post->thumbnail) {
                File::delete($post->thumbnail);
            }

            $requestData['thumbnail'] = $path;
        }

        $post->update($requestData);

        return back()->with('success', trans('Updated'));
    }

    public function destroy($id)
    {
        Post::query()->where('id', $id)->delete();
        return redirect()->route('dashboard.posts.list')->with('success', trans('Removed ').' id: '.$id);
    }

    //Site pages
    public function posts()
    {
        $posts = Post::query()->orderBy('created_at', 'desc')->paginate(10);

        return view('site.posts', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::query()->where('id', $id)->first();

        return view('site.post', compact('post'));
    }

}
