@if($threatItem->status == 'open')
<td class="incomplete">
    {{ strToUpper($threatItem->status) }}
</td>
@elseif($threatItem->status == 'closed')
<td class="complete">
    {{ strToUpper($threatItem->status) }}
</td>
@endif