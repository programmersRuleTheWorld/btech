<div class="row m-2 blList">
@can('create', App\BreakdownList::class)
    <div class="col-md-12">
<!--    <form action="{{ route('breakdownlists.store') }}" method="POST">
        @csrf
        @method('POST') !-->
            <div class="form-group mb-1">
                <input type="text" class="form-control form-control-sm" id="blTitle" name="list_title" placeholder="List Title...">
            </div>
            <div class="form-group mb-1">
                <input type="text" class="form-control form-control-sm col-md-3 due-date"  id="blDateField"  name="due_date blDateField" placeholder="Click here to show calendar...">
            </div>
            <div class="form-group mb-1">
                <textarea id="item_description" name="list_description" class="form-control" placeholder="List Description...">{{ old('list_description') }}</textarea>
                <button class="btn-dark text-info mt-2 blCreateButton" type="button">Submit</button>
            </div>
    <input type="hidden" value="{{ $ref_id }}" name="ref_id">
<!--    </form> !-->
        </div>
@endcan
@foreach($breakdownLists as $breakdownList)
    @include('clientapplications.include.breakdownlists.breakdownlists_show')
@endforeach
</div>