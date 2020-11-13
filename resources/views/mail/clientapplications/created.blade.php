@component('mail::message')
# Introduction

Thank you for contacting Bertram Technologies, your Client Application has been created and is pending review. We will follow up with you within one business day to assess your needs. We look forward to working with you!<br>
Here is a summary of your Client Application:<br>
First Name: {{ $clientApplication->first_name }} <br>
Last Name: {{ $clientApplication->last_name }}<br>
E-mail Address: {{ $clientApplication->email }}<br>
Contact Phone Number: {{ $clientApplication->phone_number }}<br>
Reference ID: {{ $clientApplication->ref_id }}<br>
Authorization Code: {{ $clientApplication->auth_code }}<br>

<br>
@endcomponent
