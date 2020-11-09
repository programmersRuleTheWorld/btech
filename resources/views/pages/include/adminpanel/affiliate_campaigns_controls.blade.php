<div class="card-body">
    <div class="table-responsive">
        <table class="table table-borderless table-condensed">
            <tr>
                <th>
                    Affiliate Name:
                </th>
                <th>
                    Affiliate ID:
                </th>
                <th>
                    Total Signups:
                </th>
                <th>
                    Total Earnings:
                </th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ $user->getName() }}
                </td>
                <td>
                    {{ $user->affiliate_id }}
                </td>
                <td>
                    {{ $user->affiliateCampaigns->count() }}
                </td>
                <td>
                    {{ $user->total_earnings }}
                </td>
                <td>
                <form action="{{ route('affiliate_details', [$user]) }}" method="GET">
                @csrf
                    <button class="btn btn-dark text-info" type="submit">View Campaigns</button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>