@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4 mb-2">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">Client Information</h3>
            </div>
            @include('clientapplications.include.clientapplication_show')
        </div>
    </div>
    <div class="col-md-8 mb-2"> 
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Developer Comments
                </h3>
            </div>
        @include('clientapplications.include.comments')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md mb-2"> 
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Breakdown List
                </h3>
            </div>
        @include('clientapplications.include.breakdownlist')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md mb-2">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Billing
                </h3>
            </div>
            @include('clientapplications.include.billing_show')
        </div>
    </div>
</div>
        
@endsection