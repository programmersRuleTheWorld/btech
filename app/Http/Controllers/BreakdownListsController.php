<?php

namespace App\Http\Controllers;

use App\BreakdownList;
use App\Events\BreakdownLists\BreakdownListCreated;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BreakdownListsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(BreakdownList::class, 'App\BreakdownList');
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
        $this->validate($request, [
            'list_title' => 'required|max:255',
            'list_description' => 'required|max:2000',
        ]);
        $breakdownList = new BreakdownList();
        $breakdownList->parent_ref_id = $request->input('ref_id');
        $breakdownList->due_date = new Carbon($request->input('due_date'));
        $breakdownList->list_title = $request->input('list_title');
        $breakdownList->list_description = $request->input('list_description');
        $breakdownList->save();

        event(new BreakdownListCreated($breakdownList));

        return redirect()->route('clientapplications.show', $breakdownList->clientApplication)->with('success', "Breakdown List added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BreakdownList  $breakdownList
     * @return \Illuminate\Http\Response
     */
    public function show(BreakdownList $breakdownList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BreakdownList  $breakdownList
     * @return \Illuminate\Http\Response
     */
    public function edit(BreakdownList $breakdownList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BreakdownList  $breakdownList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $breakdownList)
    {
        $breakdownList = BreakdownList::find($breakdownList);
        $breakdownList->due_date = new Carbon($request->input('due_date'));
        $breakdownList->save();

        return redirect()->back()->with('success', "Breakdown Item successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BreakdownList  $breakdownList
     * @return \Illuminate\Http\Response
     */
    public function destroy($breakdownList)
    {
        $breakdownList = BreakdownList::find($breakdownList);
        $breakdownList->delete();

        return redirect()->back()->with('success', "Breakdown List has been deleted!");
    }
}
