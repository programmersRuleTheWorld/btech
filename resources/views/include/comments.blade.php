        <form action="{{ route('clientapplicationcomments.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <textarea id="comment" name="comment" class="form-control col" placeholder="Comment..."></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control col" name="status" id="selection">
                    <option value="update">Update</option>
                    <option value="bug">Bug</option>
                    <option value="cost-adjustment">Cost Adjustment</option>
                    <option value="extension">Extension</option>
                    <option value="complete">Complete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="title" class="form-control" placeholder="Title...">
            </div>
        </div>
    </div>
            <input type="hidden" value="{{ $ref_id }}" name="ref_id">
            <button class="btn btn-dark text-info" type="submit">Comment</button>    
       </form>

       @foreach($comments as $comment)
            <div class="card bg-info">
                <div class="row">
                    <div class="col-md-3 text-center">
                    {{ $comment->user->name }}
                    </div>
                    <div class="col-md-3 text-center">
                    {{ $comment->title }}
                    </div>
                    <div class="col-md-3 text-center">
                    {{ $comment->created_at }}
                    </div>
                    <div class="col-md-3 text-center">
                    @include('include.comment_status')
                </div>
                <form action="{{ route('clientapplicationcomments.destroy', [$comment->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-dark text-info" type="submit">Delete</button>
                    </form>
            </div>
            </div>
            <h5 class="text-center">
                {{ $comment->comment }}
            </h5>
        </div>
        @endforeach