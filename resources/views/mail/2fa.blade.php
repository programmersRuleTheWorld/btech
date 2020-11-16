@component('mail::message')
# Introduction

Your One-Time Password is as follows: {{ $token }}<br>
Please enter this into the One-Time Password form in order to log into your account.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
