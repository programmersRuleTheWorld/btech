<div class="table-responsive">
<table class="table table-borderless table-sm table-condensed">
    @if(count($clientApplications) > 0)
    <tr class="text-center">
        <th>
            Company:
        </th>
        <th>
            Project Description:
        </th>
        <th>
            Service Type:
        </th>
        <th>
            Status:
        </th>
        <th>
            Support:
        </th>
        <th>
            Vulnerability:
        </th>
    </tr>
    </table>
    
        @foreach($clientApplications as $clientApplication)
    <table class="table table-borderless table-condensed">
            <tr class="text-center">
                <td>
                    <a class="text-info bg-dark" href="/clientapplications/{{ $clientApplication->ref_id }}">    
                        <u>{{ $clientApplication->getName() }}</u>
                    </a>
                </td>
                <td>
                    <i>{{ $clientApplication->getProjectDescription() }}</i>
                </td>
                <td>
                    {{ $clientApplication->project_type }}
                </td>
                    @include('include.status')
            @if($clientApplication->support == true)
            <td class="incomplete">
                SUPPORT
            </td>
            @elseif($clientApplication->support == false)
            <td class="complete">
                !SUPPORT
            </td>
            @endif
            @if($clientApplication->vulnerability == true)
            <td class="incomplete">
                VULNERABILITY
            </td>
            @elseif($clientApplication->vulnerability == false)
            <td class="complete">
                !VULNERABILITY
            </td>
            @endif    
        </tr>
    </table>
<div class="row ml-auto m-2">
                            <form action="{{ route('operations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                        <div class="form-group">
                            <button class="btn btn-dark text-info m-2" type="submit">Create Op</button>
                        </div>
                    </form>

                    <form action="{{ route('operations.index', [$clientApplication->ref_id]) }}" method="GET">
                        @csrf
                        <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                        <div class="form-group">
                        @if($clientApplication->operations->count() > 0)
                            <button class="btn btn-dark text-info m-2" type="submit">View Ops</a>
                        @else
                            <div class="btn btn-dark text-info m-2 disabled">View Ops</div>
                        @endif
                        </div>
                    </form>

                    <form action="{{ route('repos.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                        <div class="form-group">
                            <button class="btn btn-dark text-info m-2" type="submit">Create Repo</button>
                        </div>
                    </form>

                    <form action="{{ route('repos.show') }}" method="POST">
                        @csrf
                        <input type="hidden" name="ref_id" value="{{ $clientApplication->ref_id }}">
                        <div class="form-group">
                        @if($clientApplication->repos->count() > 0)
                            <button class="btn btn-dark text-info m-2" type="submit">View Repos</button>
                        @else
                            <div class="btn btn-dark text-info m-2 disabled">View Repos</div>
                        @endif
                        </div>
                    </form>
</div>
            @endforeach
</div>
            @else
        <h4 class="text-center">No client applications currently available.</h4>
        @endif
        {{ $clientApplications->links() }}
