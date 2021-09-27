@extends('layouts.app')

@section('content')

<div class="row mb-2">
    @include('pages.payment.include.payment_console')

    <div class="col-md-6 ml-auto">
        <div class="card bg-info">
            <div class="card-header">
            <div class="row mb-2">
                Balance Payment Total:
                <div class="col-2-md mr-auto">
                    <div class="bg-dark text-success text-left col-md" id="totalSelected">
                        @csrf
                        $0
                    </div>
                </div>
                <div class="col-md m-auto text-center">
                Payment Items
                </div>
            </div>
            </div>
            <div class="card-body">
            @foreach($breakdownLists as $breakdownList)
                <div class="row card bg-info">
                    <div class="card-header bl-header">
                        <div class="row m-1">
                            <input type="checkbox" class="checkbox" value="{{ $breakdownList->list_id }}">
                            List Total Balance:
                            <div class="bg-dark text-success text-left ml-1 col-md-2">
                                ${{ $breakdownList->list_balance }}
                            </div>
                            <div class="m-auto col">
                                {{ $breakdownList->list_title }}
                            </div>
                            <div class="bl-header-state ml-auto col">
                            </div>
                        </div>
                    </div>
                    <div class="card-body bl-body">
                        @foreach($breakdownList->breakdownItems as $breakdownItem)
                                    <div class="card bg-info card-body m-1">
                                        <div class="row mb-2">
                                            Item Total Balance: 
                                            <div class="bg-dark text-success col-2 mr-auto">
                                                {{ $breakdownItem->item_balance }}
                                            </div>
                                            <div class="text-center col">
                                                {{ $breakdownItem->item_description }}
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection