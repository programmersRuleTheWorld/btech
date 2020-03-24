<?php

namespace App\Http\Controllers;

use App\BreakdownItem;
use App\ClientApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class BreakdownItemsController extends Controller
{
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

        $breakdownitem = new BreakdownItem();
        $breakdownitem->parent_ref_id = $request->input('ref_id');
        $breakdownitem->user_id = $user->id;
        $breakdownitem->item_description = $request->input('item_description');
        $breakdownitem->save();

        return redirect()->back()->with('success', "Breakdown Item added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
    public function edit($item_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item_id)
    {
        $validatedData = $this->validate($request, [
            'item_description' => 'required',
            'item_status' => 'required'
            ]);

            $breakdownitem = BreakdownItem::find($item_id);
            $breakdownitem->update([$validatedData]);
            $breakdownitem->save();

            return redirect()->back()->with('success', "Breakdown Item saved!");
    }

    public function updatePrice(Request $request, $item_id){
        
        $breakdownitem = BreakdownItem::find($item_id);

        //add in user validation to billing!!!

        if($breakdownitem->clientapplication->user){
        $breakdownitem->clientapplication->user->user_balance -= $breakdownitem->clientapplication->project_balance;
        $breakdownitem->clientapplication->user->save();}

        $breakdownitem->clientapplication->project_balance -= $breakdownitem->item_balance;
        $breakdownitem->clientapplication->save();

        $breakdownitem->item_balance = $request->input('item_balance');
        $breakdownitem->save();

        $breakdownitem->clientapplication->project_balance += $breakdownitem->item_balance;
        $breakdownitem->clientapplication->save();

        if($breakdownitem->clientapplication->user){
        $breakdownitem->clientapplication->user->user_balance += $breakdownitem->clientapplication->project_balance;
        $breakdownitem->clientapplication->user->save();}

        return redirect()->back()->with('success', "Item $breakdownitem->item_id has been changed to $$breakdownitem->item_balance.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $item_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item_id)
    {
        $breakdownitem = BreakdownItem::find($item_id);
        $breakdownitem->clientapplication->updated_at = ClientApplication::where(['ref_id' => $breakdownitem->parent_ref_id])->update(['updated_at' => now()]);
        $breakdownitem->clientapplication->project_balance -= $breakdownitem->item_balance;
        $breakdownitem->clientapplication->save();
        $breakdownitem->delete();
        
        return redirect()->back()->with('success', "Breakdown Item deleted!");
    }

    /**
     * Set isComplete status on item.
     * @param int $item_id
     * @return \Illuminate\Http\Response
     */
    public function isComplete($item_id){
        $breakdownitem = BreakdownItem::find($item_id);
        if($breakdownitem->exists())
            {
                if($breakdownitem->item_status == false)
                {
                $breakdownitem->update(['item_status' => true]);
                return redirect()->back()->with('success', "Breakdown Item $breakdownitem->item_id has successfully been completed!");
            }
            elseif($breakdownitem->item_status = true)
            {
                $breakdownitem->update(['item_status' => false]);
                return redirect()->back()->with('error', "Breakdown Item $breakdownitem->item_id has been reverted back to incomplete.");
            }
        }
        else
        {
            redirect()->back()->with('error', "The requested resource no longer exists.");
        }
    }
}
