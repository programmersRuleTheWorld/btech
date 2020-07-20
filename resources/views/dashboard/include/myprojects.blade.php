
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
        </form>
    </div>
    <div class="table-responsive">
    <table class="table table-borderless table-sm table-condensed">
            <tr class="text-center">
                        <th>
                            Name
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Contact E-mail
                        </th>
                    </tr>
                    @if(count($clientapplications) > 0)
                        @foreach($clientapplications as $clientapplication)   
                        <tr class="text-center">
                            <th>
                                <a class="text-dark" href="/clientapplications/{{ $clientapplication->ref_id }}">
                                    <u>{{ $clientapplication->getName() }}</u>
                                </a>
                            </th>
                            <th>
                                    <i>{{ $clientapplication->getCompanyName() }}</i>
                            </th>
                            <th>
                                {{ $clientapplication->email }}
                            </th>
                            <th>
                                <div class="form-group">
                                <form action="{{ route('clientapplications.destroy', [$clientapplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                           
                                    <button type="submit" class="btn btn-dark text-info">Delete</button>
                                </form>
                                </div>
                            </tr>                        
                                @endforeach
                                @else

                        <p class="text-center col-md-6">Nothing posted yet!</p>
                    @endif
                </table>
            </div>

                        {{ $clientapplications->links() }}