@extends('layouts.app')

@section('content')
<input type="hidden" id="csrf" value="{{ csrf_token() }}">

<div class="row mb-2">
        
    <div class="col-md-4 mb-2">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">Client Information</h3>
            </div>
            <div class="card-body">
                @include('clientapplications.include.clientapplication_show')
                @if($user->isAdmin() == true)
                    @include('clientapplications.include.cadmin')
                @endif
            </div>    
        </div>
    </div>

    <div class="col-md-8 mb-2"> 
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Developer Comments
                </h3>
            </div>
            <div class="card-body">
                @if($user->isAdmin() == true)
            @include('clientapplications.include.comments.store')
                @endif
            @include('clientapplications.include.comments.show')
        </div>
        </div>
    </div>
    
</div>
<div class="row mb-2">
    <div class="col-md-8">
        <div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">
                    Breakdown List
                </h3>
            </div>
            <div class="card-body">
                @include('clientapplications.include.breakdownlists.breakdownlist')
            </div>
        </div>
    </div>
    <div class="col-md-4">
        @include('clientapplications.include.servicecontracts')
    </div>
</div>
        
@endsection