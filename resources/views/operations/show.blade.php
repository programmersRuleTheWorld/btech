@extends('layouts.app')

@section('content')

<div class="card bg-info m-2">
    <div class="card-header text-center">
        {{ $operation->operation_type }} <br>
    </div>
    <div class="card-body">
    <div class="row">
            <div class="col-md-4">    
                    Domain Host: {{ $operation->domain_host }}
            </div>
            <div class="col-md-4">    
                Server Host: {{ $operation->server_host }}
            </div>
            <div class="col-md-4">    
                Public IP: {{ $operation->public_ip }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">    
                Server Type: {{ $operation->server_type }}
            </div>
            <div class="col-md-4">    
                Domain Name: {{ $operation->domain_name }}
            </div>
            <div class="col-md-4">    
                Uptime Status: {{ ucfirst($operation->uptime_status) }}>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">    
                Payment Status: {{ ucfirst($operation->payment_status) }}
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 mb-2">
    <div class="card bg-info card-limited">
        <div class="card-header">
            <h3 class="text-center">
                Open Tickets
            </h3>
        </div>
        <div class="card-body">
                @include('operations.include.supporttickets.support_tickets_store')
                @include('operations.include.supporttickets.support_tickets_show')
        </div>
    </div>
</div>

@endsection