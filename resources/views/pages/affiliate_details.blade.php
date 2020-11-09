@extends('layouts.app')

@section('content')

<div class="card bg-info mb-2">
    <div class="card-header text-center">
        Affiliate Details
    </div>
    <div class="card-body text-center">
        <div class="row">
            <div class="panel bg-info col-md-8">
            Details on individuals and businesses you've signed up are below. The more clients whose needs
            you help Bertram Technologies fill, the more you'll make!
            </div>
            <div class="card bg-info col-md-4">
                @if($affiliateCampaigns->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm table-condensed">
                            <tr>
                                <td class="text-left">
                                    Campaign Count:
                                </td>
                                <td>
                                    {{ $affiliateCampaigns->count() }}
                                </td>
                                <td>
                                    Total Earnings:
                                </td>
                                <td class="bg-dark text-success">
                                    {{ $user->user_earnings }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-left">
                                    Referred Projects Completed:
                                </td>

                                <td>
                                    {{ $completedProjects }}
                                </td>

                            </tr>
                        </table>
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="card bg-info mb-2">
    <div class="card-header bg-danger text-center">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-condensed">
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        Sign-on Date
                    </td>
                    <td>
                        Commission Rate
                    </td>
                    <td>
                        Earnings
                    </td>
                </tr>
                @foreach($affiliateCampaigns as $affiliateCampaign)
                <tr>
                    <td>
                        {{ $affiliateCampaign->referredUser->first_name . ' ' }}
                        @if(isset($affiliateCampaign->referredUser->last_name))
                        {{ $affiliateCampaign->referredUser->last_name[0] . ' ' }}
                        @endif
                    </td>
                    <td>
                        {{ $affiliateCampaign->getCreatedAt() }}
                    </td>
                    <td>
                        {{ $affiliateCampaign->commission_rate }}
                    </td>
                    <td class="bg-dark text-success">
                        ${{ $affiliateCampaign->campaign_balance }}
                    </td>
                    @if($user->isAdmin())
                    <td>
                        <form action="{{ route('affiliatecampaigns.update', [$affiliateCampaign->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <input class="form-control form-control-sm" type="text" value="{{ $affiliateCampaign->commission_rate }}" name="commission_rate">
                            <button class="btn btn-dark text-info m-2" type="submit">Update Commission</button>
                    </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
            @else
            No affiliate campaigns available at this time.
            @endif
        </div>
    </div>
</div>
@endsection