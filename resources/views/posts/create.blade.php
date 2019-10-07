@extends('layouts.app')

@section('content')

<div class="col-6 m-auto">
    <h1 class="text-center">Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
            <div class="form-group col-10 m-auto">
            <input id="title" name="title" type="text" class="form-control" placeholder="Title...">
                <textarea id="body" name="body" class="form-control mt-3 mb-3" placeholder="Your motherfucking blog post here, BITCH.">
                </textarea>
                <button type="submit" class="btn btn-dark text-primary">
                    Submit Post
                </button>
            </div>
        </div>
    </div>

@endsection