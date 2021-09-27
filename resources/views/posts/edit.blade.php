@extends('layouts.app')

@section('content')

<div class="col-6 form-group m-auto">
    <h1 class="text-center">Edit Post</h1>
    <form action="{{ route('posts.update', [$post->post_id]) }}" method="POST">
        @csrf
        @method('PUT')
                <input id="title" name="post_title" type="text" class="form-control" value="{{ $post->post_title }}">
                <textarea id="body" name="post_body" class="form-control mt-3 mb-3 bg-infoblack">{{ $post->post_body }}</textarea>
            <div class="row mb-2">
            <button type="submit" class="btn btn-dark text-info m-1 ">
                    Submit Post
            </button>
    </form>
        <form action="{{ route('posts.destroy', [$post->post_id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark text-info m-1 " >Delete</button>
            </div>
        </form>
        </div>

@endsection