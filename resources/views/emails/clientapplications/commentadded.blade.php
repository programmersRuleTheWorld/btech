@component('mail::message')
# Introduction

A new comment has been added to your project!

{{ $comment->comment }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
