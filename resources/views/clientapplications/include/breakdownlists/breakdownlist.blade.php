<div class="row m-2">
@can('create', App\BreakdownList::class)
    <div class="col-md-12">
    <form action="{{ route('breakdownlists.store') }}" method="POST">
        @csrf
        @method('POST')
            <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="list_title" placeholder="List Title...">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-sm col-md-3" id="due-date" name="due_date" placeholder="Click here to show calendar...">
            </div>
            <div class="form-group">
                <textarea id="item_description" name="list_description" class="form-control" placeholder="List Description...">{{ old('list_description') }}</textarea>
                <button class="btn-dark text-info mt-2" type="submit">Submit</button>
            </div>
    <input type="hidden" value="{{ $ref_id }}" name="ref_id">
    </form>
        </div>
@endcan
@foreach($breakdownLists as $breakdownList)
<div class="col-md-12 mb-2">
<div class="card bg-info">
            <div class="card-header">
                <h3 class="text-center">{{ $breakdownList->list_title }}</h3>
            @can('update', $breakdownList)
            <form action="{{ route('breakdownlists.update', [$breakdownList]) }}" method="POST">
            @csrf
            @method('PATCH')
            Due Date:
            <div class="form-group">
                <input type="text" class="form-control form-control-sm col-md-3" id="due-date2" name="due_date" value="{{ $breakdownList->getDueDate() }}" placeholder="Click here to show calendar...">
            <button class="btn btn-dark text-info m-2" type="submit">Update</button>
            </div>
            </form>
            @endcan
            @cannot('update', $breakdownList)
            <h5>Due Date: {{ $breakdownList->getDueDate() }}</h5>
            @endcannot
                @include('clientapplications.include.list_status')
            </div>
            @can('delete', $breakdownList)
                <form class="ml-auto p-2" action="{{ route('breakdownlists.destroy', [$breakdownList]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark text-info" type="submit">Delete</button>
                </form>
            @endcan
            <div class="card-body">
                <p class="text-left">{{ $breakdownList->list_description }}</p>
@include('clientapplications.include.breakdownitems.breakdownitems_store')
@include('clientapplications.include.breakdownitems.breakdownitems_show')
    </div>
    </div>
</div>
</div>
@endforeach
</div>