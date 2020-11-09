<div class="table-responsive">
    <table class="table table-borderless table-condensed">
        <tr>
            <th>
                Attack Severity:
            </th>
            <th>
                Attack Surface:
            </th>
            <th>
                Attack Description:
            </th>
            <th>
                Status:
            </th>
        </tr>
@foreach($securityAnalysis->threatItems as $threatItem)
        <tr>
            <td>
                {{ $threatItem->severity }}
            </td>
            <td>
                {{ $threatItem->attack_surface }}
            </td>
            <td>
                {{ $threatItem->description }}
            </td>
            @include('securityanalyses.include.threatitems.status')
            <td>
                <form action="{{ route('threatitems.iscomplete', [$threatItem]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-dark text-info">Status</button>
                </form>
            </td>
        </tr>
@endforeach
    </table>
</div>