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
                @foreach($serviceContracts as $serviceContract)
                    <div class="row m-1">
                        <div class="col">
                            <strong>Name</strong>: {{ $serviceContract->name }}
                        </div>
                        <div class="col">
                            <strong>C Number</strong>: {{ $serviceContract->control_number }}
                        </div>
                        <div class="col">
                            <strong>Created At</strong>: {{ $serviceContract->getCreatedAt() }}
                        </div>
                        @can('download', $serviceContract)
                        <div class="col">
                            <form action="{{ route('servicecontracts.download', [$serviceContract]) }}" method="POST">
                                @csrf
                                <button class="btn btn-dark text-info col-12" type="submit">Download</button>
                            </form>
                        </div>
                        @endcan
                    </div>
                @endforeach

                {{ $serviceContracts->links() }}
                @else
                <h5 class="text-center">No service contracts currently available for this project</h5>
                @endif
            </div>
    </div>
