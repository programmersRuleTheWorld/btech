@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-12 mb-2">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Roles Controls</h3>
            </div>
            <div class="card-body">
                @include('pages.include.adminpanel.roles_controls')
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Client Applications With Open Support Tickets</h3>
            </div>
            <div class="card-body">
            @include('pages.include.adminpanel.support_tickets')
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Client Applications With Open Vulnerability Tickets</h3>
            </div>
            <div class="card-body">
            @include('pages.include.adminpanel.vulnerabilities')
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Client Repos With Open Bug Tickets</h3>
            </div>
            <div class="card-body">
            @include('pages.include.adminpanel.bugs')
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-2">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Affiliate Campaigns Cobntrols</h3>
            </div>
            <div class="card-body">
            @include('pages.include.adminpanel.affiliate_campaigns_controls')
            </div>
        </div>
    </div>
</div>

@endsection