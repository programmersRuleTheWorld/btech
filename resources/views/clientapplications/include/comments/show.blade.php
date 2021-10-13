@if($clientApplicationComments->count() > 0)

@foreach($clientApplicationComments as $clientApplicationComment)
    <div class="card bg-info m-1">
        <div class="card-header">
            <div class="row">
                <div class="mr-auto col">
                {{ $clientApplicationComment->user->getName() . ' ' }}<u>{{ $clientApplicationComment->getCreatedAt() }}</u> 
                </div>
                <div class="m-auto col">
                {{ ucfirst($clientApplicationComment->comment_title) }}
                </div>
                @include('clientapplications.include.comments.comment_status')
            </div>
            </div>
        <div class="card-body">
            <form action="{{ route('clientapplicationcomments.destroy', [$clientApplicationComment]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-dark text-info ml-auto" type="submit">Delete</button>
            </form>
            {{ $clientApplicationComment->comment_body }}
        </div>
    </div>
@endforeach

{{ $clientApplicationComments->links() }}

@else

<div class="text-center">
    No comments have been made on this Client Application yet.
</div>


@endif
