        @foreach($breakdownitems as $breakdownitem)
        <form action={{ route('breakdownitems.updateprice', [$breakdownitem->item_id]) }} method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group row">
            <div class="col-1">
                {{ $count++ }}
            </div>
            <div class="col-2">    
            <input class="form-control" name="item_balance" value={{ $breakdownitem->item_balance }}>
            </div>
            <button class="btn btn-dark text-info" type="submit">Price</button>
            </div>
        </form>
        @endforeach
