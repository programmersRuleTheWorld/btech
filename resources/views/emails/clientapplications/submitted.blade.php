@component('mail::message')
# Introduction

Thank you for contacting {{ config('app.name') }}! Below, you'll find the details you submitted, as well as a reference number
for your proposed project, which you can use to add it to your account later, if you choose to make one. This feature is
currently still in development, but you'll be one of the first to know when it's available!<br><br>

@component('mail::panel')
Name: {{ $clientapplication->name }}
Company: {{ $clientapplication->company }}
Email Address: {{ $clientapplication->email }}
Phone Number: {{ $clientapplication->number }}
Service Type: {{ $clientapplication->selection }}
Project Description: {{ $clientapplication->project }}
Reference ID: [{{ $clientapplication->ref_id }}]
@endcomponent

Thanks,<br>
{{ config('app.name') }}<br><br>
Note: (This message is sent from an unmonitored mailbox; please do not reply to this message)
@endcomponent
