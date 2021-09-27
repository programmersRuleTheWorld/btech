<?php

namespace App\Http\Controllers;

use App\BreakdownItem;
use App\ClientApplication;
use App\Transaction;
use App\Events\BreakdownItems\BreakdownItemStatusChange;
use App\Events\BreakdownItems\BreakdownItemPaymentStatusChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BreakdownItemsController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(BreakdownItem::class, 'App\BreakdownItem');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'item_description' => 'required | max: 1000'
        ]);
        $this->authorize('create', BreakdownItem::class);
        $user = auth()->user();
        $breakdownItem = new BreakdownItem();
        $breakdownItem->parent_ref_id = $request->input('ref_id');
        $breakdownItem->parent_list_id = $request->input('parent_list_id');
        if($request->input('sub_item') == true)
        {
            $breakdownItem->parent_item_id = $request->input('parent_item_id');
        }
        else
        {
            $breakdownItem->parent_item_id = null;
        }
        $breakdownItem->user_id = $user->id;
        $breakdownItem->frontend = $request->input('frontend');
        $breakdownItem->item_description = $request->input('item_description');
        $breakdownItem->save();
        
        event(new BreakdownItemStatusChange($breakdownItem));
        event(new BreakdownItemPaymentStatusChange($breakdownItem));
        
        return redirect()->back()->with('success', "Breakdown Item added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $breakdownItem
     * @return \Illuminate\Http\Response
     */
    public function show($breakdownItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $breakdownItem
     * @return \Illuminate\Http\Response
     */
    public function edit($breakdownItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $breakdownItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $breakdownItem)
    {
        $validatedData = $this->validate($request, [
            'item_description' => 'required',
            'item_status' => 'required'
            ]);

            $breakdownItem = BreakdownItem::find($breakdownItem);
            $this->authorize('update', $breakdownItem);
            $breakdownItem->update([$validatedData]);
            $breakdownItem->save(); 

            return redirect()->back()->with('success', "Breakdown Item saved!");
    }

    public function updatePrice(Request $request, $breakdownItem){
        $breakdownItem = BreakdownItem::find($breakdownItem);
        $this->authorize('updatePrice', $breakdownItem);
        if($request->input('item_balance') != $breakdownItem->item_balance)
        {
        if(isset($breakdownItem->user))
        {
            $breakdownItem->user->user_balance -= $breakdownItem->clientApplication->project_balance;
        }
        $breakdownItem->breakdownList->list_balance -= $breakdownItem->item_balance;
        $breakdownItem->breakdownList->list_deposit -= $breakdownItem->item_deposit;
        $breakdownItem->clientApplication->project_balance -= $breakdownItem->item_balance;
        $breakdownItem->clientApplication->project_deposit -= $breakdownItem->item_deposit;
        $breakdownItem->item_balance = $request->input('item_balance');
        $breakdownItem->item_deposit = $breakdownItem->item_balance * $breakdownItem->breakdownList->clientApplication->project_deposit_rate;
        $breakdownItem->breakdownList->list_balance += $breakdownItem->item_balance;
        $breakdownItem->breakdownList->list_deposit += $breakdownItem->item_deposit;
        $breakdownItem->clientApplication->project_balance += $breakdownItem->item_balance;
        $breakdownItem->clientApplication->project_deposit += $breakdownItem->item_deposit;
        if(isset($breakdownItem->user))
        {
            $breakdownItem->user->user_balance += $breakdownItem->clientApplication->project_balance;
        }
        $breakdownItem->breakdownList->save();
        $breakdownItem->clientApplication->save();
        $breakdownItem->user->save();
        $breakdownItem->save();
        event(new BreakdownItemPaymentStatusChange($breakdownItem));

        return redirect()->back()->with('success', "Item $breakdownItem->item_id has been changed to $$breakdownItem->item_balance.");
        }
        else
        {
            return redirect()->back()->with('error', "The input price must be different from the existing price.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $breakdownItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($breakdownItem)
    {
        $breakdownItem = BreakdownItem::find($breakdownItem); 
        $this->authorize('delete', $breakdownItem);
        $breakdownItem->breakdownList->list_balance -= $breakdownItem->item_balance;
        $breakdownItem->breakdownList->list_deposit -= $breakdownItem->item_deposit;
        $breakdownItem->clientApplication->project_balance -= $breakdownItem->item_balance;
        $breakdownItem->clientApplication->project_deposit -= $breakdownItem->item_deposit;
        if(isset($breakdownItem->clientApplication->user))
        {
            $breakdownItem->user->user_balance -= $breakdownItem->item_balance;
            $breakdownItem->user->save();
        }
        $breakdownItem->breakdownList->save();
        $breakdownItem->clientApplication->save();
        $breakdownItem->delete();
        
        event(new BreakdownItemPaymentStatusChange($breakdownItem));
        
        return redirect()->back()->with('success', "Breakdown Item deleted!");
        }
    /**
     * Set isComplete status on item.
     * @param int $breakdownItem
     * @return \Illuminate\Http\Response
     */
    public function isComplete($breakdownItem){
        $breakdownItem = BreakdownItem::find($breakdownItem);
        $this->authorize('isComplete', $breakdownItem);
        if($breakdownItem->exists())
        {
            if($breakdownItem->item_status == false)
            {
                $breakdownItem->item_status = true;
                $breakdownItem->save();
                event(new BreakdownItemStatusChange($breakdownItem));
                return redirect()->back()->with('success', "Breakdown Item $breakdownItem->item_id has successfully been completed!");
            }
            elseif($breakdownItem->item_status = true)
            {
                $breakdownItem->item_status = false;
                $breakdownItem->save();
                event(new BreakdownItemStatusChange($breakdownItem));
                return redirect()->back()->with('error', "Breakdown Item $breakdownItem->item_id has been reverted back to incomplete.");
            }
        }
        else
        {
            redirect()->back()->with('error', "The requested resource no longer exists.");
        }
    }
}
