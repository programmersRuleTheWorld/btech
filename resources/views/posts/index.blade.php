@extends('layouts.app')

@section('content')
    <div class="col-md-6 m-auto">
            <h1 class="text-center">Posts</h1>
        @if(count($posts) >= 1)
            @foreach($posts as $post)
                <a href="/posts/{{ $post->id }}" class="">
                    <div class="card bg-info  m-2">
                        @if($post->title >= 30)
                        <h3 class="text-center">{{ substr($post->title, 0, 29) . '...' }}</h3>
                        @else
                        <h3 class="text-center">{{ $post->title }}</h3>
                        @endif
                        <h5 class="text-center">{{ $post->user->name }}</h5>
                        @if($post->body >= 525)
                        <p>{{ substr($post->body, 0, 524) . '...' }}</p>
                        @else
                        <p>{{ $post->body }}</p>
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