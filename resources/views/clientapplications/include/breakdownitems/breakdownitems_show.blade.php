@if($breakdownLists->count() > 0)
<div class="row text-center">
    
    <div class="col">
        <b>Item</b>
    </div>
    <div class="col">
        <b>Description</b>
    </div>
        <div class="col">
        <b>Status</b>
    </div>
    <div class="col">
        <b>Updated At</b>
    </div>
    <div class="col">
        Price
    </div>
</div>
    <div class="biList">
    @foreach($breakdownList->breakdownItems as $breakdownItem)
    <div class="row text-center biField">
            <div class="col">
                {{ $count++ }}
            </div>
            <div class="col">
                <b>{{ $breakdownItem->item_description }}</b>
            </div>
            <div class="col">
                @include('clientapplications.include.item_status')
            </div>    
            <div class="col">
                <small>{{ $breakdownItem->updated_at }}</small>
            </div>
            <div class="col">
            @can('update', $breakdownItem)
            <input type="hidden" class="itemId" value="{{ $breakdownItem->item_id }}">
            @csrf
            <buparentNode.tton type="submit" class="btn btn-dark text-info biStatusUpdateButton">Status</button>
            @endcan   
            </div>
            @can('delete', $breakdownItem)
            <div class="col">
                    @csrf
                <button class="btn btn-dark text-info biDeleteButton" type="submit">Delete</button>
            </div>
            @endcan
            @can('updatePrice', $breakdownItem)
            <div class="col">
                    @csrf
                    <input type="input" class="form-control biPriceValue" name="item_balance" value="{{ $breakdownItem->item_balance }}">
                    <button class="btn btn-dark text-info m-2 biPriceUpdateButton" type="submit">Submit</button>
            </div>
            @endcan
            @if($breakdownItem->item_balance > 0.00)
            <div class="text-success bg-dark text-left border border-info biPriceField">
                ${{ $breakdownItem->item_balance }}
            </div>
            @else
            <div class="text-danger bg-dark text-left border border-info biPriceField col-md-3" value="{{ $breakdownItem->item_price }}">
                NO CHARGE
                </div>
                @endif
            </div>
            
    @endforeach
    </div>
    <div class="row">
        <div class="col col-md-3">
            Subtotal:
        </div>
        <div class="text-success bg-dark text-left border border-info blPriceField col-md-3">
            ${{ $breakdownList->list_balance }}
        </div>
    </div>
@else
<h3>No breakdown lists available at this time.</h3>
@endif