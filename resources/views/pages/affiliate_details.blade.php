@extends('layouts.app')

@section('content')

<div class="card bg-info">
    <div class="card-header text-center">
        Affiliate Details
    </div>
    <div class="card-body text-center">
        Details on individuals and businesses you've signed up are below. The more clients whose needs
        you help Bertram Technologies fill, the more you'll make!

        <div class="table-responsive">
            <table class="table table-borderless table-sm table-hover table-condensed">
                <tr>
                    <td>
                        First Name
                    </td>
                    <td>
                        Last Name
                    </td>
                    <td>
                        Poopy Email
                    </td>
                </tr>
                @foreach($clients as $client)
                <tr>
                    <td>
                        {{ $client->first_name }}
                    </td>
                    <td>
                        {{ $client->last_name }}
                    </td>
                    <td>
                        {{ $client->email }}
                    </td>
                    <td>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection