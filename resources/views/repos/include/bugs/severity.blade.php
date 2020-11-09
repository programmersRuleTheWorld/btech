@if($bug->severity == 'low')
<td>
    <div class="complete">
        {{ strToUpper($bug->severity) }}
    </div>
</td>
@elseif($bug->severity == 'medium')
<td>
    <div class="urgent">
        {{ strToUpper($bug->severity) }}
    </div>
</td>
@elseif($bug->severity == 'high')
<td>
    <div class="incomplete">
        {{ strToUpper($bug->severity) }}
    </div>
</td>
@endif