@if($breakdownList->list_status == true)
    <div class="complete border border-info">
        COMPLETE
@endif
@if($breakdownList->list_status == false)
    <div class="incomplete border border-info">
        INCOMPLETE
    @endif
</div>
