@if($breakdownList->list_status == true)
    <div class="complete border border-info blStatusField">
        COMPLETE
@elseif($breakdownList->list_status == false)
    <div class="incomplete border border-info blStatusField">
        INCOMPLETE
@endif
    </div>
