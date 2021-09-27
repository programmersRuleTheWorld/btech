@if($operation->supportTickets->count() > 0)
@foreach($operation->supportTickets as $supportTicket)
@if($supportTicket->status == 'open')
<div class="card-body">
                <div class="row mb-2">
                <h3 class="text-center m-auto">{{ $supportTicket->title }}</h3>
                <div class="float-right mr-4 m-3 pr-2 pl-2 incomplete">{{ $supportTicket->status }}</div>
                @can('delete', $supportTicket)
                <div class="form-group m-2">
                    <form action="{{ route('supporttickets.destroy', [$supportTicket->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-dark text-info float-right" type="submit">Delete</button>
                    </form>
                </div>
                @endcan
                @can('isComplete', $supportTicket)
                <div class="form-group m-2">
                    <form action="{{ route('supporttickets.iscomplete', [$supportTicket->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-dark text-info float-right" type="submit">Status</button>
                    </form>
                </div>
                @endcan
            </div>
        </div>
            <form action="{{ route('supportticketcomments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="support_ticket_id" value="{{ $supportTicket->id }}">
                
                
                <div class="form-group">
                    Add A Comment:
                    <textarea id="support_ticket_comment" class="form-control" name="comment"></textarea>
                    <button class="btn btn-dark text-info mt-3" type="submit">Submit</button>
                </div>

            @include('operations.include.supporttickets.supportticketcomments.support_ticket_comments')

    </form>
@endif
@endforeach
@else
<h5 class="text-center">There are no open support tickets for this project at this time.</h5>
@endif