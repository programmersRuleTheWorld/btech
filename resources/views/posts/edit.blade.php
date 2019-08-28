@extends('layouts/app')

@section('content')

<div class="col-6 form-group m-auto">
    <h1 class="text-center">Edit Post</h1>
    <form action="{{ route('posts.update', [$post->id]) }}" method="POST">
        @csrf
        @method('PUT')
                <input id="title" name="title" type="text" class="form-control" value="{{ $post->title }}">
                <textarea id="body" name="body" class="form-control mt-3 mb-3 bg-black">{{ $post->body }}</textarea>
            <div class="row">
            <button type="submit" class="btn btn-dark m-1 text-warning">
                    Submit Post
            </button>
    </form>
        <form action="{{ route('posts.destroy', [$post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark m-1 text-warning" >Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection