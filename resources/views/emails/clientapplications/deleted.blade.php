@component('mail::message')
# Introduction

Project has been removed from your account, but you can always add it back in from the dashboard screen at a later date.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
