@extends('layouts.app')

@section('content')

@if(session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="row mb-5">
    <div class="col">
        <div class="card bg-info">
            <div class="card-header text-center">
                Affiliate Panel
            </div>
            <div class="card-body">
                @include('dashboard.include.affiliate_panel')
            </div>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>
                    My Operations
                </h3>
            </div>
            <div class="card-body">
            @include('dashboard.include.myoperations')
            </div>
        </div>
    </div>
</div>
@can('create', App\Post::class)
<div class="row mb-2">
    <div class="col-md-12">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>
                    My Posts
                </h3>
            </div>
            <div class="card-body">
            @include('dashboard.include.myposts')
            </div>
        </div>
    </div>
</div>
@endcan
<div class="row mb-2">
    <div class="col-md-12">
        <div class="card bg-info">
            <div class="card-header">
                <div class="col-md-6 m-auto">
                    <h3 class="text-center">
                        My Projects
                    </h3>
                </div>
            </div>
            <div class="card-body">
            <div class="col-md-3 mt-2">
                <div class="text-success text-center bg-dark text-left">
                    My balance: ${{ $user->user_balance }}
                </div>
            </div>
            @include('dashboard.include.myprojects')
        </div>
    </div>
</div>
@endsection
