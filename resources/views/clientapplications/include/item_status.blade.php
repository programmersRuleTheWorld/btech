@if($breakdownItem->item_status == true)
    <td class="complete border border-info">
        COMPLETE
@endif
@if($breakdownItem->item_status == false)
    <td class="incomplete border border-info">
        INCOMPLETE
    @endif
</td>
