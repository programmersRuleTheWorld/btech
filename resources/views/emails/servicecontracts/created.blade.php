@component('mail::message')
<img src="{{ asset('images/btlogo.gif') }}" width=200>

Hello,

This e-mail is to inform you that a Service Contract, Control Number <b>{{ $serviceContract->control_number }}</b> has been generated for project {{ $serviceContract->clientApplication->ref_id }} and is awaiting your signature. Please click this <a href="https://www.bertramtechnologies.com/clientapplications/{{ $serviceContract->parent_ref_id ]) }}">link</a> to go to your user portal and download the Service Contract PDF from the Service Contracts panel at the bottom of the Client Application Page.<br>Please e-mail the completed signature page to contracts@bertramtechnologies.com or mail to PO Box 2021, Albany, NY; 12220 as soon as possible. <u>Work will not begin until you have read through and attested to your understanding and agreement with the contract and all terms therein</u>.


We look forward to continuing to serve you, and we hope you're getting your money's worth so far. If you're not, that's a problem, so never hesitate to <a href="https://www.bertramtechnologies.com/contact">let us know if we let you down.</a><br>

This mailbox is unmonitored, please direct all replies relating to this contract to contracts@bertramtechnologies.com or mail to PO Box 2021, Albany, NY; 12220.

{{ config('app.name') }}
@endcomponent