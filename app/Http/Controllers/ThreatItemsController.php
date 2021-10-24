<?php

namespace App\Http\Controllers;

use App\ThreatItem;
use App\Events\ThreatItems\ThreatItemOpened;
use App\Events\ThreatItems\ThreatItemClosed;
use Illuminate\Http\Request;

class ThreatItemsController extends Controller
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
        $this->authorize('create', ThreatItem::class);
        $threatItem = new ThreatItem();
        $threatItem->security_analysis_id = $request->input('security_analysis_id');
        $threatItem->user_id = auth()->user()->id;
        $threatItem->description = $request->input('description');
        $threatItem->severity = $request->input('severity');
        $threatItem->attack_type = $request->input('attack_type');
        $threatItem->attack_surface = $request->input('attack_surface');

        $threatItem->save();

        event(new ThreatItemOpened($threatItem));

        return redirect()->route('securityanalyses.index', [$request])->with('success', "Threat Item successfully opened");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ThreatItem  $threatItem
     * @return \Illuminate\Http\Response
     */
    public function show(ThreatItem $threatItem)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThreatItem  $threatItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ThreatItem $threatItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ThreatItem  $threatItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThreatItem $threatItem)
    {
        //
    }

    public function isComplete(ThreatItem $threatItem)
    {
        $this->authorize('update', $threatItem);
        if($threatItem->status == 'open')
        {
            $threatItem->status = 'closed';
            $threatItem->save();
            event(new ThreatItemClosed($threatItem));

            return redirect()->back()->with('success', "Threat Item successfully closed.");
        }
        if($threatItem->status == 'closed')
        {
            $threatItem->status = 'open';
            $threatItem->save();
            event(new ThreatItemOpened($threatItem));

            return redirect()->route('securityanalyses.index', [$threatItem->securityAnalysis->operation->securityAnalyses])->with('success', "Threat Item successfully reopened.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThreatItem  $threatItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThreatItem $threatItem)
    {
        //
    }
}
