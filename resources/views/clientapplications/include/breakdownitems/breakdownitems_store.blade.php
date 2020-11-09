<div class="row m-2">
@can('create', App\BreakdownItem::class)
<div class="col-md">
<form action="{{ route('breakdownitems.store') }}" method="POST">
    @csrf
    @method('POST')
        <div class="form-group">
        <select class="form-control" name="frontend">
            <option value="{{ 0 }}">Backend</option>
            <option value="{{ 1 }}">Frontend</option>
        </select>
        </div>
        <div class="form-group">
            <textarea id="item_description" name="item_description" class="form-control" placeholder="Item Description...">{{ old('item_description') }}</textarea>
            <button class="btn-dark text-info mt-2" type="submit">Submit</button>
        </div>
    </div>
<input type="hidden" value="{{ $ref_id }}" name="ref_id">
<input type="hidden" value="{{ $breakdownList->list_id }}" name="parent_list_id">
</form>
@endcan