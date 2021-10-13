<form action="{{ route('clientapplicationcomments.store') }}" method="POST">
    <div class="row">
            <input type="hidden" value="{{ $clientApplication->ref_id }}" name="ref_id">
            @csrf
            <input class="form-control form-control-sm col m-1" name="comment_title" placeholder="Comment title...">
            <select class="form-control form-control-sm col m-1" name="comment_status">
            <option value="consultation">Consultation</option>
            <option value="update">Update</option>
            <option value="bug">Bug</option>
            <option value="system">System</option>
            <option value="cost-change">Cost Change</option>
            </select>
        </div>
        <div class="row">
            <textarea class="form-control m-1" id="comment" name="comment_body"></textarea>
        </div>
        <button type="submit" class="btn btn-dark text-info">Submit</button>
</form>