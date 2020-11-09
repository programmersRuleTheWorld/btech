@if($operations->count() > 0)
<div class="table-responsive">
    <table class="table table-borderless table-condensed text-center">
<tr class="font-weight-bold h5">
    <td>
        Service Type:
    </td>
    <td>
        Domain Name:
    </td>
    <td>
        Uptime Status:
    </td>
    <td>
        Payment Status:
    </td>
</tr>
@foreach($operations as $operation)
@can('view', $operation)
<tr>
    <td>
        {{ $operation->clientApplication->project_type }}
    </td>
    <td>
    @if($operation->clientApplication->project_type === "Web Design/Development")
        {{ $operation->domain_name }}
    @else
    None specified
    @endif
    </td>
    @if($operation->uptime_status === 'running')
    <td class="bg-success">
    @elseif($operation->uptime_status === 'maintenance')
    <td class="bg-alert">
    @else
    <td class="bg-danger">
    @endif
        {{ ucfirst($operation->uptime_status) }}
    </td>

    @if($operation->payment_status === 'paid')
    <td class="bg-success">
    @elseif($operation->payment_status === 'unpaid')
    <td class="bg-danger">
    @elseif($operation->payment_status === 'refunded')
    <td class="bg-alert">
    @else
    <td class>
    @endif
        {{ ucfirst($operation->payment_status) }}
    </td>
    <td>
        <form action="{{ route('operations.show', [$operation]) }}" method="GET">

            <button class="btn btn-dark text-info" type="submit">View Operation</button>
        </form>
    </td>
</tr>
@endcan
@endforeach
    </table>
</div>
@else
<div class="text-center">
You have no operations currently running.
</div>
@endif