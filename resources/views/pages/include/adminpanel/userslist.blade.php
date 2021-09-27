<div class="row mb-2">
    <div class="col-md-12">
        <div class="card bg-info">
            <div class="card-header text-center">
                <h3>Users List</h3>
            </div>
            <div class="card-body">
                @if($users->count() > 0)
                    @foreach($users as $user)
                            <div class="col">
                                <div class="card bg-info">
                                    <div class="card-header">
                                        <div class="row mb-2">
                                        <h3 class="m-auto">{{ $user->getName() }}</h3>
                                        <form class="ml-auto" action="{{ route('dashboard_privileged', [$user]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user" value="{{ $user->id }}">
                                            <button class="btn btn-dark text-info" type="submit">
                                                View User
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md">
                                    E-mail: {{ $user->getEmail() }}
                                            </div>
                                            <div class="col-md">
                                    Company Name: {{ $user->getCompanyName() }}
                                            </div>        
                                            <div class="col-md">
                                    CA Count: {{ $user->clientApplications->count() }}
                                            </div>        
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md">
                                    Affiliate ID: {{ $user->affiliate_id }}
                                            </div>
                                            <div class="col-md">
                                    User Spend: {{ $user->user_spend }}
                                            </div>
                                            <div class="col-md">
                                    User Earnings: {{ $user->user_earnings }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>