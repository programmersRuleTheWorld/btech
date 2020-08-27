<div class="row m-2">
@can('create', App\BreakdownItem::class)
<div class="col-md">
<form action="{{ route('breakdownitems.store') }}" method="POST">
    @csrf
    @method('POST')
        <div class="form-group">
            <textarea id="item_description" name="item_description" class="form-control" placeholder="Item Description..."></textarea>
            <button class="btn-dark text-info mt-2" type="submit">Submit</button>
        </div>
    </div>
<input type="hidden" value={{ $ref_id }} name="ref_id">
</form>
@endcan
<div class="col-md-6 ml-auto">
    <div class="card bg-info">
        <div class="card-header">
            <h5 class="text-center">
                Service Contracts
            </h5>
            @can('create', App\ServiceContract::class)
            <form action="{{ route('servicecontracts.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $ref_id }}" name="ref_id">
                <button class="btn btn-dark text-info" type="submit">Generate PDF</button>
            </form>
            @endcan
</div>
            <div class="card-body">
                @if($serviceContracts->count() > 0)
        <h6 class="text-center">All service contracts associated with this project can be accessed below</h6>
        @foreach($serviceContracts as $serviceContract)
        {!! $serviceContract->name !!}<br>
        @endforeach
                @else
        <h6 class="text-center">No service contracts currently available for this project</h6>
                @endif
        </div>
    </div>
</div>
</div>

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

    @foreach($breakdownItems as $breakdownItem)
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
                    <button class="btn btn-dark text-info" type="submit">Submit</button>
                </form>
            </td>
            @endcan
            @cannot('updatePrice', $breakdownItem)
            @if($breakdownItem->item_balance > 0.00)
            <td class="text-success bg-dark text-left border border-info">
                ${{ $breakdownItem->item_balance }}
            </td>
            @else
            <td class="text-danger bg-dark text-left border border-info">
                NO CHARGE
            </td>
            @endif
            @endcannot
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
            ${{ $clientApplication->project_balance }}
        </td>
    </tr>
    </table>
    </div>
