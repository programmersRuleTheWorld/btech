@can('create', App\BreakdownItem::class)
<div class="row m-2" id="breakdownItemStore">
<div class="col-md">
<!-- <form id="breakdownItemForm" action="{{ route('breakdownitems.store') }}" method="POST"> !-->
    @csrf
    @method('POST')
        <div class="form-group">
        <select class="form-control mb-1" name="frontend">
            <option value="{{ 0 }}">Backend</option>
            <option value="{{ 1 }}">Frontend</option>
        </select>
            <textarea id="item_description" name="item_description" class="form-control mb-1" placeholder="Item Description...">{{ old('item_description') }}</textarea>
            <button class="btn-dark text-info mt-2 biCreateButton" type="submit">Submit</button>
        </div>
<input type="hidden" value="{{ $ref_id }}" name="ref_id">
<input type="hidden" value="{{ $breakdownList->list_id }}" name="parent_list_id">
<!-- </form> !-->
    </div>
</div>
@endcan