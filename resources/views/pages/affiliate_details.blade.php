@extends('layouts.app')

@section('content')

<div class="card bg-info">
    <div class="card-header text-center">
        Affiliate Details
    </div>
    <div class="card-body text-center">
        Details on individuals and businesses you've signed up are below. The more clients whose needs
        you help Bertram Technologies fill, the more you'll make!
    </div>
</div>
<div class="card bg-info">
    <div class="card-header bg-danger text-center">
        
    </div>
        <div class="table-responsive">
            <table class="table table-borderless table-sm table-hover table-condensed">
                <tr>
                    <td>
                        Company Name
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
                @foreach($affiliate_campaigns as $affiliate_campaign)
                <tr>
                    <td>
                        {{ $affiliate_campaign->referred_user->company_name ?? '' }}
                    </td>
                    <td>
                        {{ $affiliate_campaign->created_at }}
                    </td>
                    <td>
                        {{ $affiliate_campaign->commission_rate }}
                    </td>
                    <td class="bg-dark text-success">
                        ${{ $affiliate_campaign->campaign_balance }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>

@endsection