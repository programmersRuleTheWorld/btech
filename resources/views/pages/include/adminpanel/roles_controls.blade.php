<div class="table-responsive">
            <table class="table table-borderless table-sm table-condensed">
            <tr>
                <td>
                    <b>Number:</b>
                </td>
                <td>
                    <b>Privileges:
                </td>
                <td>
                </td>
                <td>
                    <b>Name:</b>
                </td>
                <td>
                    <b>Total Contracts:</b>
                </td>
                <td>
                    Revenue Earned:
                </td>
                <td>
                    Revenue Unearned:
                </td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $count++ }}
                </td>

                <td>
                @if($user->roles()->first() !== null)
                @foreach($user->roles as $role)
                    {{ $role->name }}
                @endforeach
                @else
                <i>No privileges granted</i>
                @endif
                </td>
                <td>
                    <form action="{{ route('users.updaterole', [$user->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <select class="form-control form-control-sm" name="role">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach    
                    </select>

                    <button class="btn btn-dark text-info m-1" type="submit">Toggle Role</button>
                    </form>
                </td>
                <td>
                    {{ $user->getName() }}
                </td>
                <td>
                    {{ $user->clientApplications->count() }}
                </td>
                <td class="bg-dark text-success">
                    {{ $user->user_spend }}
                </td>
                <td class="bg-dark text-danger">
                    {{ $user->user_balance }}
                </td>
                <td>
                    <form action="{{ route('users.destroy', [$user->id]) }}" method='POST'>
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-dark text-info" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </table>
            {{ $users->links() }}
        </div>