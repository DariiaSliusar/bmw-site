@extends('layouts.main')

@section('content')
    <div class="row">
        @foreach($posts as $post)
            <div class="col-12 col-md-6">
                <div class="card m-3">

                    @if($post->thumbnail)
                        <img src="/storage/{{ $post->thumbnail }}" class="card-img-top" alt="...">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">
                            {!! $post->short !!}
                        </p>
                        <p class="card-text">
                            <small class="text-body-secondary">
                                {{ $post->created_at }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="my-3">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
