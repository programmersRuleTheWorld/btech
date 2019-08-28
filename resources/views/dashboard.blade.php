@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="card bg-warning">
            @include('include/myposts')
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-warning">
            @include('include/myprojects')
        </div>
    </div>
</div>
    
@endsection
