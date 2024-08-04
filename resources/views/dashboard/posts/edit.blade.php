@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Post Edit') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
                            </div>
                            <div class="mb-3">
                                <label for="short" class="form-label">{{ __('Short text') }}</label>
                                <textarea class="form-control" id="short" rows="3" name="short">{{$post->short}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">{{ __('Content') }}</label>
                                <textarea class="form-control" id="content" rows="7" name="content">{{$post->content}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">{{ __('Thumbnail') }}</label>
                                <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
