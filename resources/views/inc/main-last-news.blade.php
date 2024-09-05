<div class="my-3 d-flex flex-column flex-md-row gap-3">
    @foreach($posts as $post)
        <div class="card">

            @if($post->thumbnail)
                <img src="/storage/{{ $post->thumbnail }}" class="card-img-top" alt="{{ $post->title }}">
            @endif

            <div class="card-body">
                <a href="{{route('site.post', $post->id)}}">
                    <p class="card-text">{{$post->title}}</p>
                </a>
            </div>
        </div>
    @endforeach
</div>



