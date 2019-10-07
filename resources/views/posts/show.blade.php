@extends('layouts.app')

@section('content')

    <div class="col-8 m-auto">
            <div class="card bg-info  m-1">
                <h1 class="text-center">{{ $post->title }}</h1>
                <small class="text-center">Published on {{ $post->created_at }}</small>
                    <div>
                        <hr>
                        <p><h5 class="text-center">{{ $post->body }}</h5></p>

                    </div>
                </div>
                <div class="row ml-2">
            <a href="/posts" class="btn btn-dark text-primary m-1">Back</a>
            @if(!Auth::guest() && Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-dark text-primary m-1">Edit</a>
            </div>
            @endif
            </div>

@endsection