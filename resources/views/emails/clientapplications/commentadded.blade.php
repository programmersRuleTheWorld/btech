@component('mail::message')
#Client Correspondence Unit

A new comment has been added to your project at {{ $comment->created_at }} by {{ $comment->user->name }}.

<p>{{ $comment->comment }}</p>

Please contact us if you have any questions about your project, its progress, or any pending work.<br>
{{ config('app.name') }}
@endcomponent
