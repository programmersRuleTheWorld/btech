@extends('layouts.app')

@section('content')

<div class="row mb-2">
    @include('pages.payment.include.payment_console')

    <div class="col-md-6 ml-auto">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">Current Operations for {{ $clientApplication->ref_id }}</h3>
            </div>
            <div class="card-body">
                <div class="m-auto">
                    Monthly Website Hosting
                </div>
            </div>
        </div>
    </div>

@endsection