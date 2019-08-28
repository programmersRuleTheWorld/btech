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
                            <form action="// route('clientapplications.addrefid', [$clientapplication->ref_id]) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="form-row">
                                <input class="form-control" id="updatedrefid" name="updatedrefid" type="integer" maxlength="9" placeholder="Type Ref ID ex. 991923314">
                                <button class="btn btn-dark text-warning" type="submit">Add Project</button>
                                </div>
                            </form>
                        </th>
                    @if(count($projects) > 0)
                        @foreach($projects as $project)   
                        <tr>
                            <td>
                                {{ $project->name }}
                            </td>
                            <td>
                                {{ $project->company }}
                            </td>
                            <td>
                                {{ $project->email }}
                            </td>
                            <td>
                                {{ $project->number }}
                            </td>
                            @if(strlen($project->project) >= 26)
                            <td>
                                {{ substr($project->project, 0, 25).'...' }}
                            </td>
                                @else
                            <td>
                                {{ $project->project }}
                            </td>
                                @endif
                            <td>
                                {{ $project->created_at }}
                            </td>
                            <td>
                                <form action="{{ route('clientapplications.destroy', [$project->ref_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                           
                                    <button type="submit" class="btn btn-dark text-warning" >Delete</button>
                                </form>
                                </td>
                                @endforeach
                            </tr>
                    @else
                        <p class="text-center col-md-6">Nothing posted yet!</p>
                    @endif
                        </table>