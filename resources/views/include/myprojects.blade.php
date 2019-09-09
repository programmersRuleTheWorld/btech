<h3 class="text-center">
        My Projects
    </h3>
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
                        <th>
                            <form action="{{ route('clientapplications.appendto') }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="form-row">
                                <input class="form-control" id="updatedrefid" name="updatedrefid" maxlength="5" placeholder="Type Ref ID ex. 99192">
                                <button class="btn btn-dark text-warning" type="submit">Add Project</button>
                                </div>
                            </form>
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
                                    <button type="submit" class="btn btn-dark text-warning" >Delete</button>
                                </form>
                                </td>
                                @endforeach
                            </tr>
                    @else
                        <p class="text-center col-md-6">Nothing posted yet!</p>
                    @endif
                        </table>