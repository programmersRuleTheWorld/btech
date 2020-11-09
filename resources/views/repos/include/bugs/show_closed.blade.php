@if($repo->bugs->count() > 0)
@foreach($repo->bugs as $bug)
@if($bug->status == false)
<tr>
    <td>
        {{ $bug->branch }}
    </td>
    <td>
        {{ $bug->description }}
    </td>
        @include('repos.include.bugs.severity')
        @include('repos.include.bugs.status')
    <td>
        <form action="{{ route('bugs.iscomplete', [$bug->id]) }}" method="POST">
        @method('PUT')        
        @csrf
        <button class="btn btn-dark text-info" type="submit">Status</button>
        </form>    
    </td>
</tr>
@endif
@endforeach
@else
<h5>No bugs available for view at this time.</h5>
@endif