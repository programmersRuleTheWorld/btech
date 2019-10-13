        <h3 class="text-center">Open Contracts</h3>
        <table class="table table-striped table-hover  table-condensed">
            <tr class="bg-info  ">
                <th>
                    Company
                </th>
                <th>
                    Project Description
                </th>
                <th>
                    Service Type
                </th>
                <th>
                </th>
                <th>
                    Status
                </th>
            </tr>
    @if(count($jobs) > 0)
        @foreach($jobs as $job)
            <tr>
                <td>
                    <a class="text-dark" href="/clientapplications/{{ $job->ref_id }}" class="">    
                    <u>{{ $job->company }}</u>
                    </a>
                </td>
                <td>{{ $job->project }}</td>
                <td>{{ $job->selection }}</td>
                <td>@include('include.status')</td>
            </tr>
            @endforeach

        @else
        <h6 class="text-center">No jobs currently available.</h4>
        @endif
        
        </table>
        {{ $jobs->links() }}
