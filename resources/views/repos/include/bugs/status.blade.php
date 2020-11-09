@if($bug->status == true)
<td>
    <div class="incomplete">
        OPEN
    </div>
</td>
@elseif($bug->status == false)
<td>
    <div class="complete">
        CLOSED
    </div>
</td>
@endif