@extends('layouts.app')

@section('content')

@if($operations->count() > 0)
@foreach($operations as $operation)
<div class="card bg-info m-2">
    <div class="card-header text-center">
        {{ $operation->operation_type }} <br>
    </div>
    <div class="card-body">
        <form action="{{ route('operations.update', [$operation->id]) }}" method="POST">
        @method('PUT')
        @csrf
    <div class="row">
            <div class="col-md-4">    
                <div class="form-group">
                    Domain Host:
                    <input class="form-control" type="text" name="domain_host" value="{{ $operation->domain_host }}">
                </div>
            </div>
            <div class="col-md-4">    
                <div class="form-group">
                Server Host:
                    <input class="form-control" type="text" name="server_host" value="{{ $operation->server_host }}">
                </div>
            </div>
            <div class="col-md-4">    
                <div class="form-group">
                Public IP:
                    <input class="form-control" type="text" name="public_ip" value="{{ $operation->public_ip }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">    
                <div class="form-group">
                Server Type:
                    <input class="form-control" type="text" name="server_type" value="{{ $operation->server_type }}">
                </div>
            </div>
            <div class="col-md-4">    
                <div class="form-group">
                Domain Name:
                    <input class="form-control" type="text" name="domain_name" value="{{ $operation->domain_name }}">
                </div>
            </div>
            <div class="col-md-4">    
                <div class="form-group">
                Uptime Status:
                    <select class="form-control" name="uptime_status" value="{{ $operation->uptime_status }}">
                        <option value="running">Running</option>
                        <option value="down">Down</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">    
                <div class="form-group">
                Payment Status:
                <select class="form-control" name="payment_status" value="{{ $operation->payment_status }}">
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="refunded">Refunded</option>
                    </select>
                </div>
            </div>
        </div>
        <div  class="row">
        <form action="{{ route('operations.update', [$operation->id]) }}" method="POST">
        @csrf
        @method('PUT')
            <button class="btn btn-dark text-info m-2" type="submit">Update Operation</button>
        </form>
        <form action="{{ route('securityanalyses.index') }}" method="GET">
        @csrf
        <input type="hidden" value="{{ $operation->id }}" name="operation_id">
            <button class="btn btn-dark text-info m-2" type="submit">Show SecAnalyses</button>
        </form>
        @can('create', App\SecurityAnalysis::class)
        <form action="{{ route('securityanalyses.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $operation->id }}" name="operation_id">
        <input type="hidden" value="{{ $operation->parent_ref_id }}" name="ref_id">
            <button class="btn btn-dark text-info m-2" type="submit">Generate SecAnalysis</button>
        </form>
        @endcan
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
@endforeach
@else
<div class="card bg-info m-2">
    <div class="card-header text-center">
        No operations running at this time.
    </div>
    <div class="card-body">
    </div>
</div>
@endif

@endsection