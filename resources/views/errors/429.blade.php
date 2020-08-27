@extends('layouts/app')

@section('content')

<div class="card bg-info col-md-6 m-auto text-center">
    <div class="card-header">
        <h2>You're sending too many requests</h3>
    </div>
    <div class="card-body">
        <p>
            Please wait a moment before trying again.
        </p>
    </div>
</div>

@endsection