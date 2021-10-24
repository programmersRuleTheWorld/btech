@if($breakdownLists->count() > 0)
    <div class="biList">
    @foreach($breakdownList->breakdownItems as $breakdownItem)
    <div class="row text-center biField">
            <div class="col-sm">
            <b>Item</b>: {{ $count++ }}
            </div>
            <div class="col-sm">
            <b>Description</b>: <b>{{ $breakdownItem->item_description }}</b>
            </div>
            <div class="col-sm">
            <b>Status</b>: @include('clientapplications.include.item_status')
            </div>    
            <div class="col-sm">
            <b>Updated At</b>: <small>{{ $breakdownItem->updated_at }}</small>
            </div>
            <div class="col-sm">
            @can('update', $breakdownItem)
            <input type="hidden" class="itemId" value="{{ $breakdownItem->item_id }}">
            @csrf
            <button type="submit" class="btn btn-dark text-info biStatusUpdateButton">Status</button>
            @endcan   
            </div>
            @can('delete', $breakdownItem)
            <div class="col-sm">
                    @csrf
                <button class="btn btn-dark text-info biDeleteButton" type="submit">Delete</button>
            </div>
            @endcan
            @can('updatePrice', $breakdownItem)
            <div class="col-sm">
                    @csrf
                    <input type="input" class="form-control biPriceValue" name="item_balance" value="{{ $breakdownItem->item_balance }}">
                    <button class="btn btn-dark text-info m-2 biPriceUpdateButton" type="submit">Submit</button>
            </div>
            @endcan
            @if($breakdownItem->item_balance > 0.00)
            <div class="text-success bg-dark text-left border border-info biPriceField col-sm-4">
                ${{ $breakdownItem->item_balance + $breakdownItem->item_deposit }}
            </div>
            @else
            <div class="text-danger bg-dark text-right border border-info biPriceField col-sm-4">
                NO CHARGE
                </div>
                @endif
            </div>
    @endforeach
    </div>
    <div class="row ml-auto">
        <div class="col-sm-6">
            Subtotal:
            <div class="text-success bg-dark border border-info blPriceField">
            ${{ $breakdownList->list_balance + $breakdownList->list_deposit }}
            </div>
        </div>
    </div>
    
@else
<h3>No breakdown lists available at this time.</h3>
@endif