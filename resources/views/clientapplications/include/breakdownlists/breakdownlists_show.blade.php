<div class="col-md-12 mb-2 bl">
<div class="card bg-info">
    @if($breakdownList->list_status == 1)
            <div class="card-header bl-header bg-success text-dark">
    @else
            <div class="card-header bl-header bg-danger text-light">
    @endif 
                <h3 class="text-center">{{ $breakdownList->list_title }}<h3 class="bl-header-state ml-auto"></h3></h3>
            </div>
            <div class="card-body bl-body">
                @can('update', $breakdownList)
            @csrf
            Due Date:
            <div class="form-group">
                <input type="text" class="form-control form-control-sm col-md-3 due-date blDateField" name="due_date" value="{{ $breakdownList->getDueDate() }}" placeholder="Click here to show calendar...">
                <input type="hidden" class="blToken" value="{{ $breakdownList->list_id }}">
                <button class="btn btn-dark text-info m-2 blDateUpdateButton" type="submit">Update</button>
            </div>
            @endcan
            @cannot('update', $breakdownList)
            <h5>Due Date: {{ $breakdownList->getDueDate() }}</h5>
            @endcannot
                @include('clientapplications.include.list_status')
                @can('delete', $breakdownList)
                <!-- <form class="ml-auto p-2" action="{{ route('breakdownlists.destroy', [$breakdownList]) }}" method="POST"> !-->
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark text-info blDeleteButton" type="submit">Delete</button>
                <!-- </form> !-->
                @endcan
                <p class="text-left">{{ $breakdownList->list_description }}</p>
                @include('clientapplications.include.breakdownitems.breakdownitems_store')
                @include('clientapplications.include.breakdownitems.breakdownitems_show')
            </div>
</div>
</div>
