@if($operations->count() > 0)

@foreach($operations as $operation)
@can('view', $operation)
<div class="row mb-1">
    <div class="col">
    Service Type:{{ $operation->clientApplication->project_type }}
    </div>
    <div class="col">
    @if($operation->clientApplication->project_type === "Web Design/Development" && $operation->clientApplication->domain_name != null)
    Domain Name:{{ $operation->domain_name }}
    @else
    Domain Name: None specified
    @endif
    
    @if($operation->clientApplication->project_type != "Web Design/Development" && $operation->clientApplication->project_name != null)
    Project Name:{{ $operation->project_name }}
    @endif

    </div>
    @if($operation->uptime_status === 'running')
    <div class="col bg-success">
    @elseif($operation->uptime_status === 'maintenance')
    <div class="col bg-alert">
    @else
    <div class="col bg-danger">
    @endif
        Uptime Status: {{ ucfirst($operation->uptime_status) }}
    </div>

    @if($operation->payment_status === 'paid')
    <div class="col bg-success">
    @elseif($operation->payment_status === 'unpaid')
    <div class="col bg-danger">
    @elseif($operation->payment_status === 'refunded')
    <div class="col bg-alert">
    @else
    <div class="col" class>
    @endif
        Payment Status: {{ ucfirst($operation->payment_status) }}
    </div>
    <div class="col">
        <form action="{{ route('operations.show', [$operation]) }}" method="GET">

            <button class="btn btn-dark text-info" type="submit">Submit Support Ticket</button>
        </form>
    </div>
</div>
@endcan
@endforeach
@else
<div class="text-center">
You have no operations currently running.
</div>
@endif