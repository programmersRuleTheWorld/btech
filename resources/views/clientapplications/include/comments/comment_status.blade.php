@if($clientApplicationComment->comment_status == 'consultation')
<div class="ml-auto col follow-up">
@elseif($clientApplicationComment->comment_status == 'update')
<div class="ml-auto col complete">
@elseif($clientApplicationComment->comment_status == 'bug')
<div class="ml-auto col urgent">
@elseif($clientApplicationComment->comment_status == 'system')
<div class="ml-auto col unpaid">
@elseif($clientApplicationComment->comment_status == 'cost-change')
<div class="ml-auto col late">
    @endif
    {{ ucfirst($clientApplicationComment->comment_status) }}
</div>