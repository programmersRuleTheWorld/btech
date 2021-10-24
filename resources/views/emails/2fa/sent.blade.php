@component('mail::message')
<img src="{{ asset('images/btlogo.gif') }}" width=200>

For your security, accessing your account requires use of a One-Time-Password (OTP) as a form of Two-Factor Authentication. We recommend you secure any e-mail address you use with your account with a hardware authentication key, and strongly discourage the use of SMS/text authentication.<br>
Your OTP token is as follows, please copy and paste this into the form on our website to proceed: {{ $token }}<br>
Thank you for your cooperation,<br>
Security Division

{{ config('app.name') }}
@endcomponent