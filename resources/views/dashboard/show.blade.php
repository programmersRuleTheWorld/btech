@extends('layouts.app')

@section('content')

@if (session('status'))
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
<div class="row mb-5">
    <div class="col-md-5">
        <div class="card bg-info ">
            <div class="card-header text-center">
                <h3>
                    My Posts
                </h3>
            </div>
            @include('dashboard.include.myposts')
        </div>
    </div>
<div class="col-md-7">
        <div class="card bg-info ">
            <div class="card-header">
                <div class="col-md-3">
                    <div class="text-success text-center bg-dark text-left">
                        My balance: ${{ $user->user_balance }}
                    </div>
                </div>
                <div class="col-md-6 m-auto">
                    <h3 class="text-center">
                        My Projects
                    </h3>
                </div>
            </div>
            @include('dashboard.include.myprojects')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Open Projects
                </h3>
            </div>
            @include('dashboard.include.myjobs')
        </div>
    </div>
</div>
    
@endsection
