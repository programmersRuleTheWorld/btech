<?php

namespace App\Http\Controllers;

use App\BreakdownItem;
use App\ClientApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BreakdownItemsController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(BreakdownItem::class, 'breakdownitem');
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

        $user = auth()->user();

        $breakdownItem = new BreakdownItem();
        $breakdownItem->parent_ref_id = $request->input('ref_id');
        $breakdownItem->user_id = $user->id;
        $breakdownItem->item_description = $request->input('item_description');
        $breakdownItem->save();

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
            $breakdownItem->update([$validatedData]);
            $breakdownItem->save();

            return redirect()->back()->with('success', "Breakdown Item saved!");
    }

    public function updatePrice(Request $request, $breakdownItem){
        $breakdownItem = BreakdownItem::find($breakdownItem);

        //add in user validation to billing!!!

        if($breakdownItem->clientapplication->user){
        $breakdownItem->clientapplication->user->user_balance -= $breakdownItem->clientapplication->project_balance;
        $breakdownItem->clientapplication->user->save();}

        $breakdownItem->clientapplication->project_balance -= $breakdownItem->item_balance;
        $breakdownItem->clientapplication->save();

        $breakdownItem->item_balance = $request->input('item_balance');
        $breakdownItem->save();

        $breakdownItem->clientapplication->project_balance += $breakdownItem->item_balance;
        $breakdownItem->clientapplication->save();

        if($breakdownItem->clientapplication->user){
        $breakdownItem->clientapplication->user->user_balance += $breakdownItem->clientapplication->project_balance;
        $breakdownItem->clientapplication->user->save();}

        return redirect()->back()->with('success', "Item $breakdownItem->item_id has been changed to $$breakdownItem->item_balance.");
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
        $breakdownItem->clientapplication->updated_at = ClientApplication::where(['ref_id' => $breakdownItem->parent_ref_id])->update(['updated_at' => now()]);
        $breakdownItem->clientapplication->project_balance -= $breakdownItem->item_balance;
        $breakdownItem->clientapplication->save();
        $breakdownItem->delete();
        
        return redirect()->back()->with('success', "Breakdown Item deleted!");
    }

    /**
     * Set isComplete status on item.
     * @param int $breakdownItem
     * @return \Illuminate\Http\Response
     */
    public function isComplete($breakdownItem){
        $breakdownItem = BreakdownItem::find($breakdownItem);
        if($breakdownItem->exists())
            {
                if($breakdownItem->item_status == false)
                {
                $breakdownItem->update(['item_status' => true]);
                return redirect()->back()->with('success', "Breakdown Item $breakdownItem->item_id has successfully been completed!");
            }
            elseif($breakdownItem->item_status = true)
            {
                $breakdownItem->update(['item_status' => false]);
                return redirect()->back()->with('error', "Breakdown Item $breakdownItem->item_id has been reverted back to incomplete.");
            }
        }
        else
        {
            redirect()->back()->with('error', "The requested resource no longer exists.");
        }
    }
}
