@can('create', App\SupportTicket::class)
<form action="{{ route('supporttickets.store') }}" method="POST">
    @csrf
    <input type="hidden" name="operation_id" value="{{ $operation->id }}">

    <div class="form-group">
        <input class="form-control" name="title" placeholder="Enter a descriptive title for your problem...">
    </div>
    <div class="form-group">
        <textarea id="support_ticket" class="form-control" name="comment" placeholder="Please elaborate on the nature of the problem..."></textarea>
    </div>
    <button class="btn btn-dark text-info" type="submit">Submit</button>
</form>
@endcan