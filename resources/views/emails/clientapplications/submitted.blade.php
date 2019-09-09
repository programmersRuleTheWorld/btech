@component('mail::message')
# Introduction

Thank you for contacting {{ config('app.name') }}! Below, you'll find the details you submitted, as well as a reference number
for your proposed project, which you can use to add it to your account later, if you choose to make one. This feature is
currently still in development, but you'll be one of the first to know when it's available!<br><br>

Name: {{ $clientapplication->name }}<br>
Company: {{ $clientapplication->company }}<br>
Email Address: {{ $clientapplication->email }}<br>
Phone Number: {{ $clientapplication->number }}<br>
Service Type: {{ $clientapplication->selection }}<br>
Project Description: {{ $clientapplication->project }}<br>
Confirmation Number: {{ $clientapplication->conf_num }}<br>
Reference ID: [{{ $clientapplication->ref_id }}]

Thanks,<br>
{{ config('app.name') }}<br><br>
Note: (This message is sent from an unmonitored mailbox; please do not reply to this message)
@endcomponent
