@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Users</h3>
            </div>
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-borderless table-sm table-condensed">
            <tr>
                <td>
                    <b>ID:</b>
                </td>
                <td>
                    <b>Name:</b>
                </td>
                <td>
                    <b>Total Contracts:</b>
                </td>
                <td>
                    Total Spend Realized:
                </td>
                <td>
                    Total Spend Unrealized:
                </td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $count++ }}
                </td>
                <td>
                    {{ $user->getName() }}
                </td>
                <td>
                    {{ $user->clientapplications->count() }}
                </td>
                <td class="bg-dark text-success">
                    {{ $user->user_spend }}
                </td>
                <td class="bg-dark text-danger">
                    {{ $user->user_balance }}
                </td>
                <td>
                    <form action="{{ route('profiles.destroy', [$user->id]) }}" method='POST'>
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
            </div>
        </div>
    </div>
</div>

@endsection