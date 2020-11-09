@if($breakdownLists->count() > 0)
<div class="table-responsive">
<table class="table table-borderless table-sm table-condensed">
<tr class="text-center">
    
    <th>
        <b>Priority</b>
    </th>
    <th>
        <b>Description</b>
    </th>
        <th>
        <b>Status</b>
    </th>
    <th>
        <b>Updated At</b>
    </th>
    <th>
    </th>
    <th>
    </th>
    <th>
        Price
    </th>
</tr>

    @foreach($breakdownList->breakdownItems as $breakdownItem)
    <tr class="text-center">
            <td>
                {{ $count++ }}
            </td>
            <td>
                <b>{{ $breakdownItem->item_description }}</b>
            </td>
                @include('clientapplications.include.item_status')
            <td>
                <small>{{ $breakdownItem->updated_at }}</small>
            </td>
            <td>
            @can('update', $breakdownItem)
                <form action="{{ route('breakdownitems.iscomplete', [$breakdownItem->item_id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark text-info">Status</button>
                </form>
            @endcan   
            </td>
            <td>
            @can('delete', $breakdownItem)
            <form action="{{ route('breakdownitems.destroy', [$breakdownItem->item_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-dark text-info" type="submit">Delete</button>
            </form>
            @endcan
            </td>
            @can('updatePrice', $breakdownItem)
            <td>
                <form action="{{ route('breakdownitems.updateprice', [$breakdownItem->item_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="input" class="form-control" name="item_balance" value="{{ $breakdownItem->item_balance }}">
                    <button class="btn btn-dark text-info m-2" type="submit">Submit</button>
                </form>
            </td>
            @endcan
            @if($breakdownItem->item_balance > 0.00)
            <td class="text-success bg-dark text-left border border-info">
                ${{ $breakdownItem->item_balance }}
            </td>
            @else
            <td class="text-danger bg-dark text-left border border-info">
                NO CHARGE
            </td>
            @endif
        </tr>   
            
    @endforeach
    <tr>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td class="text-center">
            Subtotal:
        </td>
        <td class="text-success bg-dark text-left border border-info">
            ${{ $breakdownList->list_balance }}
        </td>
    </tr>
    </table>
    </div>
@else
<h3>No breakdown lists available at this time.</h3>
@endif