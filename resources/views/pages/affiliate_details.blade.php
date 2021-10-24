@extends('layouts.app')

@section('content')

<div class="card bg-info mb-2">
    <div class="card-header text-center">
        Affiliate Details
    </div>
    <div class="card-body text-center">
        <div class="row mb-2">
            <div class="panel bg-info col-md-8">
            Details on individuals and businesses you've signed up are below. The more clients whose needs
            you help Bertram Technologies fill, the more you'll make!
            </div>
            <div class="card bg-info col-md-4">
                @if($affiliateCampaigns->count() > 0)
                            <div class="row">
                                <td class="text-left">
                                    Campaign Count:
                                </div>
                                <div class="col">
                                    {{ $affiliateCampaigns->count() }}
                                </div>
                                <div class="col">
                                    Total Earnings:
                                </div>
                                <td class="bg-dark text-success">
                                    {{ $user->user_earnings }}
                                </div>
                            </div>
                            <div class="row">
                                <td class="text-left">
                                    Referred Projects Completed:
                                </div>

                                <div class="col">
                                    {{ $completedProjects }}
                                </div>

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
                <div class="row">
                    <div class="col">
                        Name:
                    </div>
                    <div class="col">
                        Sign-on Date
                    </div>
                    <div class="col">
                        Commission Rate
                    </div>
                    <div class="col">
                        Earnings
                    </div>
                </div>
                @foreach($affiliateCampaigns as $affiliateCampaign)
                <div class="row">
                    <div class="col">
                        {{ $affiliateCampaign->referredUser->first_name . ' ' }}
                        @if(isset($affiliateCampaign->referredUser->last_name))
                        {{ $affiliateCampaign->referredUser->last_name[0] . ' ' }}
                        @endif
                    </div>
                    <div class="col">
                        {{ $affiliateCampaign->getCreatedAt() }}
                    </div>
                    <div class="col">
                        {{ $affiliateCampaign->commission_rate }}
                    </div>
                    <div class="bg-dark text-success">
                        ${{ $affiliateCampaign->campaign_balance }}
                    </div>
                    @if($user->isAdmin())
                    <div class="col">
                        <form action="{{ route('affiliatecampaigns.update', [$affiliateCampaign->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <input class="form-control form-control-sm" type="text" value="{{ $affiliateCampaign->commission_rate }}" name="commission_rate">
                            <button class="btn btn-dark text-info m-2" type="submit">Update Commission</button>
                         </form>
                    </div>
                    @endif
                </div>
                @endforeach
            </table>
            @else
            No affiliate campaigns available at this time.
            @endif
        </div>
    </div>
@endsection