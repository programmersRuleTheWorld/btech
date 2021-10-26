@component('mail::message')
<img src="www.bertramtechnologies.com/images/btlogoMinified.gif" width=200>

Hello,

This e-mail is to inform you that {{ $breakdownList->list_description }} on project {{ $breakdownList->clientApplication->ref_id }} due on {{ $breakdownList->getDueDate() }} has been completed.


We look forward to continuing to serve you, and we hope you're getting your money's worth so far. If you're not, that's a problem, so never hesitate to <a href="{{ route('contact') }}">let us know if we let you down.</a><br>

This mailbox is unmonitored, please direct all replies relating to this project to fulfillment@bertramtechnologies.com or mail to PO Box 2021, Albany, NY; 12220.


{{ config('app.name') }}
@endcomponent