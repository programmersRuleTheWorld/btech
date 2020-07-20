<div class="table-responsive">
<table class="table table-borderless table-sm table-condensed">
    <tr class="text-center">
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
            Status
        </th>
    </tr>
    
    @if(count($jobs) > 0)
        @foreach($jobs as $job)
            <tr class="text-center">
                <td>
                    <a class="text-info bg-dark" href="/clientapplications/{{ $job->ref_id }}">    
                        <u>{{ $job->getName() }}</u>
                    </a>
                </td>
                <td>
                    <i>{{ $job->getProjectDescription() }}</i>
                </td>
                <td>
                    {{ $job->project_type }}
                </td>
                @include('include.status')
            </tr>
            @endforeach
            @else

        <h4 class="text-center">No jobs currently available.</h4>
        @endif
    </table>
</div>
        {{ $jobs->links() }}
