@component('mail::message')

<img src="{{ asset('images/btlogo.gif') }}" width=200>

Thank you for choosing Bertram Technologies, this is a record of your recent submission; please keep this for your records: <br>
First Name: {{ $clientApplication->first_name }}<br>
Last Name: {{ $clientApplication->last_name }}<br>
Contact Phone Number: {{ $clientApplication->phone_number }}<br>
Contact E-mail: {{ $clientApplication->email }}<br>
Ref ID: {{ $clientApplication->ref_id }}<br>
Service Type: {{ $clientApplication->project_type }}<br>
Due Date: {{ $clientApplication->getDueDate() }}<br>
Project Name: {{ $clientApplication->project_name }}<br>

We look forward to showing you why Bertram Technologies aspires to be an industry leader in secure, efficient software development.

This mailbox is unmonitored, please direct all replies relating to this project to fulfillment@bertramtechnologies.com or mail to PO Box 2021, Albany, NY; 12220.

Thanks, <br>
{{ config('app.name') }}
@endcomponent
