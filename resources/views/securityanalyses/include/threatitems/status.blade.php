@if($threatItem->status == 'open')
<div class="incomplete">
    {{ strToUpper($threatItem->status) }}
</div>
@elseif($threatItem->status == 'closed')
<div class="complete">
    {{ strToUpper($threatItem->status) }}
</div>
@endif