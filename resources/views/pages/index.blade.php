@extends('layouts/app')

@section('content')

<div class="row mb-3">
    <div class="col-md-4">
        <div class="card bg-warning">
            <div class="card-body">
@include('include/featuredpost')
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning">
            <div class="card-body">
                    <h5 class="text-center">
                        Welcome to Bertram Technologies! Need a new website or mobile app, maintenance for an existing one,
                        or a custom web project or legacy code work (COBOL, C, etc.)?
                    </h3>
                    <h2 class="text-center">
                        Let us know today!
                    </h2>
                        Fields marked * required
@include('include/clientapplication')
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning">
@include('include/heroanimation')
        </div>
    </div>
</div>

@endsection