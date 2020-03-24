@extends('layouts.app')

@section('content')
    <div class="col-md-6 m-auto">
            <h1 class="text-center">Posts</h1>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <a href={{ route('posts.show', [$post->post_id]) }} class="text-dark">
                    <div class="card bg-info  m-2">
                        @if($post->post_title >= 30)
                        <h3 class="text-center">{{ substr($post->post_title, 0, 29) . '...' }}</h3>
                        @else
                        <h3 class="text-center">{{ $post->post_title }}</h3>
                        @endif
                        @if($post->post_body >= 525)
                        <p>{{ substr($post->post_body, 0, 524) . '...' }}</p>
                        @else
                        <p>{{ $post->post_body }}</p>
                        @endif                        
                        <small class="text-center">Published on {{ $post->created_at }}</small>
                    </div>
                </a>
            @endforeach
        @else
            <p class="text-center">No posts found</p>
    @endif
</div>
@endsection