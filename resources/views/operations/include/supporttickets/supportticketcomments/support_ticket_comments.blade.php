@if($supportTicket->supportTicketComments->count() > 0)
<table class="table table-condensed table-borderless">
    <tr>
    <th>
        Respondent:
    </th>
    <th>
        Time:
    </th>
    <th>
        Ticket Comment:
    </th>
    </tr>
@foreach($supportTicket->supportTicketComments as $supportTicketComment)
<tr>
<td>
    {{ $supportTicketComment->respondent_type }}
</td>
<td>
    {{ $supportTicketComment->created_at }}
</td>
<td>
    {{ $supportTicketComment->comment }}
</td>
<td>
    @can('delete', $supportTicketComment)
        <form action="{{ route('supportticketcomments.destroy', [$supportTicketComment->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-dark text-info" type="submit">Delete</button>
        </form>
    @endcan
</td>
</tr>
@endforeach
</table>
@else
<p class="text-center">
There are not yet any comments on this support ticket
</p>
@endif