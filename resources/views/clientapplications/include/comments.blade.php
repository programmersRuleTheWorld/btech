
    <form class="m-2" action={{ route('clientapplicationcomments.store') }} method="POST">
        @csrf
        @method('POST')
<div class="row">
        <div class="col-md">
                <div class="form-group">
                    <select class="form-control col" name="comment_status" id="selection">
                        <option value="update">Update</option>
                        <option value="bug">Bug</option>
                        <option value="cost-adjustment">Cost Adjustment</option>
                        <option value="extension">Extension</option>
                        <option value="complete">Complete</option>
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <input type="text" name="comment_title" class="form-control" placeholder="Title...">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                        <textarea id="comment" name="comment_body" class="form-control col" placeholder="Comment..."></textarea>
                </div>
            </div>
        </div>
            <input type="hidden" value={{ $ref_id }} name="ref_id">
            <button class="btn btn-dark text-info" type="submit">Comment</button>    
       </form>
       <div class="table-responsive">
       <table class="table table-borderless table-sm table-condensed">
                <tr>
                    <th>
                        Author
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Updated At
                    </th>
                    <th>
                        Status
                    </th>
       @foreach($comments as $comment)
                <tr>
                    <td>
                    {{ $comment->user->name }}
                    </td>
                    <td>
                    <b>{{ $comment->comment_title }}</b>
                    </td>
                    <td>
                    {{ $comment->updated_at }}
                    </td>
                    @include('clientapplications.include.comment_status')
                    <td>
                    <form action="{{ route('clientapplicationcomments.destroy', [$comment->comment_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-dark text-info" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-center">
                        {{ $comment->comment_body }}
                    </h5>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
