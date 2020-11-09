@component('mail::message')
# Breakdown Item Status Changed

Breakdown Item <b>"{{ $breakdownItem->item_description }}"</b> for project {{$breakdownItem->clientApplication->ref_id }} has been marked as complete.

@component('mail::button', ['url' => route('clientapplications.show', [$breakdownItem->clientApplication])])
View Client Application
@endcomponent


<br>
{{ config('app.name') }}
@endcomponent
