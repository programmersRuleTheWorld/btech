    <div class="card bg-info">
        <div class="card-header">
            <h3 class="text-center">
                Service Contracts
            </h3>
        </div>
        <div class="card-body">
            @can('create', App\ServiceContract::class)
            <form action="{{ route('servicecontracts.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $ref_id }}" name="ref_id">
                <button class="btn btn-dark text-info float-right" type="submit">Generate PDF</button>
            </form>
            @endcan
                @if($serviceContracts->count() > 0)
        <h6 class="text-center">All service contracts associated with this project can be accessed below. To download, click the title; to view in your browser, click the corresponding "view" button.</h6>
        <table class="table table-condensed table-borderless">
        @foreach($serviceContracts as $serviceContract)
        <tr>
        <td>
        <a class="text-dark" href="{{ route('servicecontracts.download', [$serviceContract]) }}"><u>{!! $serviceContract->name !!}</u></a>
        </td>
<!--        <td>
        <form action="{{ route('servicecontracts.show', [$serviceContract->id]) }}" method="GET">
        <button class="btn btn-dark text-info" type="submit">View</button>
        </form>
        </td> !-->
        </tr>
        @endforeach
        </table>
                @else
        <h5 class="text-center">No service contracts currently available for this project</h5>
                @endif
        </div>
    </div>
