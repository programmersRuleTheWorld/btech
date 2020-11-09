
    <form class="col m-auto p-3" action="{{ route('clientapplications.appendto') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                <input class="form-control mb-2" name="ref_id" maxlength="15" placeholder="Type Ref ID ex. 4645213846">
                </div>
                <div class="col-md-6">
                <input class="form-control mb-2" name="auth_code" maxlength="128" placeholder="Copy and paste Auth Code">
                </div>
            </div>
                <div class="form-row">
                <button class="btn btn-dark text-info" type="submit">Add Project</button>
        </form>
        <form class="col m-auto" action="{{ route('clientapplications.revokeall') }}" method="POST">
            @method('PATCH')
            @csrf
            <button class="btn btn-dark text-info" type="submit">Reset Auth Codes</button>
                </div>
        </form>
    <div class="table-responsive">
    <table class="table table-borderless table-sm table-condensed">
            <tr class="text-center">
                        <th>
                            Service Type:
                        </th>
                        <th>
                            Contact E-mail:
                        </th>
                        <th>
                            Project Status:
                        </th>
                    </tr>
                    @if(count($clientApplications) > 0)
                        @foreach($clientApplications as $clientApplication)   
                        <tr class="text-center">
                            <th>
                                <u><a class="text-dark" href="{{ route('clientapplications.show', [$clientApplication]) }}">{{ $clientApplication->project_type }}</a></u>
                            </th>
                            <th>
                                {{ $clientApplication->email }}
                            </th>
                                @include('include.status')
                            <th>
                                <div class="form-group">
                                @can('delete', $clientApplication)
                                <form action="{{ route('clientapplications.destroy', [$clientApplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                       
                                    <button type="submit" class="btn btn-dark text-info">Delete</button>
                                </form>
                                @endcan
                                </div>
                            </tr>                        
                                @endforeach
                                @else

                        <p class="text-center col-md-6">Nothing posted yet!</p>
                    @endif
                </table>
            </div>
                        {{ $clientApplications->links() }}