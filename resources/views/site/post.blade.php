@extends('layouts.main')

@section('content')
    <div class="card m-3">

        @if($post->thumbnail)
            <img src="/storage/{{ $post->thumbnail }}" class="card-img-top" alt="{{ $post->title }}">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">
                {!! $post->content !!}
            </p>
            <p class="card-text">
                <small class="text-body-secondary">
                    {{ $post->created_at }}
                </small>
            </p>
        </div>
    </div>
@endsection

