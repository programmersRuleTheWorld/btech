@extends('layouts.app')

@section('content')

<input type="hidden" value="{{ csrf_token() }}" id="token">
<input type="hidden" value="{{ $idempotencyKey }}" id="idempotencyKey">
<input type="hidden" value="{{ $clientApplication->ref_id }}" id="refId">

<div class="row">
    <div class="col-md-6">
        <div class="card bg-info mr-auto">
            <div class="card-header text-center">
            <h3>Make A Payment:</h3>
            </div>
            <div class="card-body">
            @if($selectedList != null && $selectedList->list_balance > 0 || $clientApplication->deposit_payment_status === 0)
            @include('include.payment_interface')
            @else
            Payment controls are currently unavailable, please choose a Breakdown List with payable items.
            @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-info ml-auto">
            <div class="card-header text-center">
                <h3>Payment Summary:</h3>
            </div>
            <div class="card-body">
            @if($clientApplication->deposit_payment_status == true)
    <form action="{{ route('client_application_payment', [$clientApplication]) }}" method="POST">
    @csrf
        <div class="form-group">
            <div class="row p-2">
            <b class="m-auto text-center">Breakdown List Select</b>
                <select class="form-control col-md-4" name="selected_value">
                @foreach($breakdownLists as $breakdownList)
                <option value="{{ $breakdownList->list_id }}">{{ $breakdownList->list_title }}</option>
                @endforeach
                </select>
                <button class="btn btn-dark text-info col-md-1 m-auto" type="submit">Go</button>
            </div>
        </div>
    </form>
        @if(isset($selectedList) && $selectedList->breakdownItems->count() > 0)
        <div class="table-responsive">
            <table class="table table-borderless table-condensed">
                <tr>
                    <th>
                        Breakdown Item Description:
                    </th>
                    <th>
                        Breakdown Item Balance:
                    </th>
                </tr>
                @foreach($selectedList->breakdownItems as $breakdownItem)
                <tr>
                    <td>
                    {{ $breakdownItem->item_description }}
                    </td>
                    <td class="bg-dark text-success">
                    ${{ $breakdownItem->item_balance }}
                    </td>
                </tr>
                @endforeach
                <tr>
                <td>
                </td>
                </tr>
                <tr>
                    <td>
                        Amount Due:
                    </td>
                    <td class="bg-dark text-success">
                        ${{ $selectedList->list_balance }}
                    </td>
                </tr>
            </table>
        </div>
        @elseif(!isset($selectedList))
        Please select the Breakdown List you wish to pay for using the form above, and press "Go" when you have made your selection to automatically populate this module.
        @elseif($selectedList->breakdownItems->count() <= 0)
        This Breakdown List has no eligible items.
        @endif
        @elseif($clientApplication->deposit_payment_status == false)
            <div class="table-responsive">
                <table class="table table-borderless table-condensed">
            @foreach($clientApplication->breakdownLists as $breakdownList)
                    <tr>
                        <th>
                            Breakdown List Title:
                        </th>
                        <th class="text-left">
                            {{ $breakdownList->list_title }}
                        </th>
                        <th>
                            Breakdown List Deposit Total:
                        </th>
                        <td class="bg-dark text-success text-left">
                            ${{ $breakdownList->list_deposit }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Breakdown Item Description:
                        </th>
                        <th>
                            Breakdown Item Balance:
                        </th>
                        <th>
                            Breakdown Item Deposit:
                        </th>
                    </tr>
                        @foreach($breakdownList->breakdownItems as $breakdownItem)
                    <tr>
                        <td>
                            <u>{{ $breakdownItem->item_description }}</u>
                        </td>
                        <td class="bg-dark text-success text-left">
                            ${{ $breakdownItem->item_balance }}
                        </td>
                        <td class="bg-dark text-success text-left">
                            ${{ $breakdownItem->item_deposit }}
                        </td>
                    </tr>
                        @endforeach
            @endforeach
                </table>
            </div>
        @endif
        </div>
    </div>
</div>

@endsection