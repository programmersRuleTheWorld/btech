
<h3 class="text-center">
        My Projects
    </h3>
    <form class="col m-auto" action="{{ route('clientapplications.appendto') }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-md-6">
                <input class="form-control mb-2" name="ref_id" maxlength="15" placeholder="Type Ref ID ex. 4645213846">
                </div>
                <div class="col-md-6">
                <input class="form-control mb-2" name="auth_code" maxlength="128" placeholder="Copy and paste Auth Code">
                </div>
                <button class="btn btn-dark text-warning" type="submit">Add Project</button>
        </form>
        <form class="col m-auto" action="{{ route('clientapplications.revokeall') }}" method="POST">
            @method('PATCH')
            @csrf
            <button class="btn btn-dark text-warning" type="submit">Revoke</button>
        </form>
    <table class="table table-borderless">
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
                            Contact Phone
                        </th>
                        <th>
                            Proposal Brief
                        </th>
                        <th>
                            Submitted At
                        </th>
                    @if(count($clientapplications) > 0)
                        @foreach($clientapplications as $clientapplication)   
                        <tr>
                            <td>
                                {{ $clientapplication->name }}
                            </td>
                            <td>
                                {{ $clientapplication->company }}
                            </td>
                            <td>
                                {{ $clientapplication->email }}
                            </td>
                            <td>
                                {{ $clientapplication->number }}
                            </td>
                            @if(strlen($clientapplication->project) >= 26)
                            <td>
                                {{ substr($clientapplication->project, 0, 25).'...' }}
                            </td>
                                @else
                            <td>
                                {{ $clientapplication->project }}
                            </td>
                                @endif
                            <td>
                                {{ $clientapplication->created_at }}
                            </td>
                            <td>
                                <form action="{{ route('clientapplications.removefrom', [$clientapplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')                           
                                    <button type="submit" class="btn btn-dark text-warning" >Remove</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('clientapplications.destroy', [$clientapplication->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                           
                                    <button type="submit" class="btn btn-dark text-warning" onclick="alert('This option will permanently delete this project and cannot be undone; continue?')">Delete</button>
                                </form>
                            </td>
                            
                                @endforeach
                            </tr>
                    @else
                        <p class="text-center col-md-6">Nothing posted yet!</p>
                    @endif
                        </table>