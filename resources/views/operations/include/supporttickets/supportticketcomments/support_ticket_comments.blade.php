@if($supportTicket->supportTicketComments->count() > 0)
    <div class="row">
        <div class="col">
            Respondent:
        </div>
        <div class="col">
            Time:
        </div>
        <div class="col">
            Ticket Comment:
        </div>
    </div>
@foreach($supportTicket->supportTicketComments as $supportTicketComment)
<div class="row">
    <div class="col">
        {{ $supportTicketComment->respondent_type }}
    </div>
    <div class="col">
        {{ $supportTicketComment->created_at }}
    </div>
    <div class="col">
        {{ $supportTicketComment->comment }}
    </div>
    <div class="col">
        @can('delete', $supportTicketComment)
            <form action="{{ route('supportticketcomments.destroy', [$supportTicketComment->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-dark text-info" type="submit">Delete</button>
            </form>
        @endcan
    </div>
</div>
@endforeach
@else
    <p class="text-center">
        There are not yet any comments on this support ticket
    </p>
@endif