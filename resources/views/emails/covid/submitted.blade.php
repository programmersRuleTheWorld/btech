@component('mail::message')
Thank you for contacting Bertram Technologies in regards to the 1099 Marketing Opportunity,<br><br>

You sent us the following information:<br><br>

First Name: {{ $covidform->first_name }}<br>
Email: {{ $covidform->email }}<br><br>

We have received your inquiry and will respond when our marketing program has been finalized
if you are still interested.

Take care,<br>
{{ config('app.name') }}
<img src="{{ asset('images/logos/btlogoredgradient.svg') }}" class="img-fluid">
@endcomponent
