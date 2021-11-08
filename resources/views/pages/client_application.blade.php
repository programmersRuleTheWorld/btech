@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card bg-info">
            <div class="card-header">
                <h2 class="text-center">Client Application</h2>
            </div>
            <div class="card-body">
            @include('pages.include.clientapplication')
            </div>
    </div>
</div>

@endsection