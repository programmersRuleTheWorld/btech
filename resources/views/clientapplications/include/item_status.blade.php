@if($breakdownItem->item_status == true)
    <div class="bg-success border border-info biStatusField">
        COMPLETE
@endif
@if($breakdownItem->item_status == false)
    <div class="bg-danger border border-info biStatusField">
        INCOMPLETE
@endif
    </div>
