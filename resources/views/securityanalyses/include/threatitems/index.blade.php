        <div class="row">
            <div class="col">
                Attack Severity:
            </div>
            <div class="col">
                Attack Surface:
            </div>
            <div class="col">
                Attack Description:
            </div>
            <div class="col">
                Status:
            </div>
        </div>
@foreach($securityAnalysis->threatItems as $threatItem)
        <div class="row">
            <div class="col">
                {{ $threatItem->severity }}
            </div>
            <div class="col">
                {{ $threatItem->attack_surface }}
            </div>
            <div class="col">
                {{ $threatItem->description }}
            </div>
            @include('securityanalyses.include.threatitems.status')
            <div class="col">
                <form action="{{ route('threatitems.iscomplete', [$threatItem]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-dark text-info">Status</button>
                </form>
            </div>
        </div>
@endforeach