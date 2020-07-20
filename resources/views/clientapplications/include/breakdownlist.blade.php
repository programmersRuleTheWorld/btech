
<form class="m-2" action={{ route('breakdownitems.store') }} method="POST">
    @csrf
    @method('POST')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <textarea id="item_description" name="item_description" class="form-control" placeholder="Item Description..."></textarea>
            <button class="btn-dark text-info mt-2" type="submit">Submit</button>
        </div>
    </div>
<input type="hidden" value={{ $ref_id }} name="ref_id">
</form>
<div class="col-md-6">
    <div class="card bg-info">
        <div class="card-header">
            <h5 class="text-center">
                Service Contracts
            </h5>
        </div>
        This module will contain all generated service contract PDFs for download by the client.
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

    @foreach($breakdownitems as $breakdownitem)
    <tr class="text-center">
            <td>
                {{ $count++ }}
            </td>
            <td>
                <b>{{ $breakdownitem->item_description }}</b>
            </td>
                @include('clientapplications.include.item_status')
            <td>
                <small>{{ $breakdownitem->updated_at }}</small>
            </td>
            <td>
                <form action={{ route('breakdownitems.iscomplete', [$breakdownitem->item_id]) }} method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark text-info">Status</button>
                </form>   
            </td>
            <td>            
            <form action="{{ route('breakdownitems.destroy', [$breakdownitem->item_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-dark text-info" type="submit">Delete</button>
            </form>
            </td>    
            @if($breakdownitem->item_balance > 0.00)
            <td class="text-success bg-dark text-left border border-info">
                ${{ $breakdownitem->item_balance }}
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
            ${{ $clientapplication->project_balance }}
        </td>
    </tr>
    </table>
</div>