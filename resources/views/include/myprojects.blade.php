
<h3 class="text-center">
    My Projects
</h3>
    <form class="col m-auto p-3" action="{{ route('clientapplications.appendto') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6">
                <input class="form-control mb-2" name="ref_id" maxlength="15" placeholder="Type Ref ID ex. 4645213846">
                </div>
                <div class="col-md-6">
                <input class="form-control mb-2" name="auth_code" maxlength="128" placeholder="Copy and paste Auth Code">
                </div>
                <button class="btn btn-dark text-info" type="submit">Add Project</button>
        </form>
        <form class="col m-auto" action="{{ route('clientapplications.revokeall') }}" method="POST">
            @method('PATCH')
            @csrf
            <button class="btn btn-dark text-info" type="submit">Reset Auth Codes</button>
        </form>
    </div>
    <table class="table table-striped table-hover table-condensed">
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Company
                        </th>
                        <th>
                            Contact E-mail
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                    @if(count($clientapplications) > 0)
                        @foreach($clientapplications as $clientapplication)   
                        <tr>
                            <td>
                                {{ $clientapplication->name }}
                            </td>
                            <td>
                                <a class="text-dark" href="/clientapplications/{{ $clientapplication->ref_id }}" class="">
                                    <u>{{ $clientapplication->company }}</u>
                                </a>
                            </td>
                            <td>
                                {{ $clientapplication->email }}
                            </td>
                            <td>
                                <div class="form-group">
                                <form action="{{ route('clientapplications.destroy', [$clientapplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                           
                                    <button type="submit" class="btn btn-dark text-info" onclick="alert('This option will permanently delete this project and cannot be undone; continue?')">Delete</button>
                                </form>
                                </div>
                            </div>
                            </td>
                        </tr>                            
                                @endforeach
                    @else
                        <p class="text-center col-md-6">Nothing posted yet!</p>
                    @endif
                        </table>

                        {{ $clientapplications->links() }}