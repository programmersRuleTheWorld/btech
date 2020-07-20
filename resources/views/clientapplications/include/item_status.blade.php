@if($breakdownitem->item_status == true)
    <td class="complete border border-info">
        COMPLETE
@endif
@if($breakdownitem->item_status == false)
    <td class="incomplete border border-info">
        INCOMPLETE
    @endif
</td>
