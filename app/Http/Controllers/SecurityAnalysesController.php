<?php

namespace App\Http\Controllers;

use App\SecurityAnalysis;
use App\ThreatItem;
use PDF;
use App\Events\SecurityAnalyses\SecurityAnalysisCreated;
use App\Events\SecurityAnalyses\SecurityAnalysisGenerated;
use Illuminate\Http\Request;

class SecurityAnalysesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $operation_id = $request->input('operation_id');
        $securityAnalyses = SecurityAnalysis::where('operation_id', $operation_id)->get();

        return view('securityanalyses.index')->with('securityAnalyses', $securityAnalyses);
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
        $this->authorize('create', SecurityAnalysis::class);
        $securityAnalysis = new SecurityAnalysis();
        $securityAnalysis->user_id = auth()->user()->id;
        $securityAnalysis->operation_id = $request->input('operation_id');
        $securityAnalysis->severity = $request->input('severity');
        $securityAnalysis->description = $request->input('description');
        $securityAnalysis->save();

        return redirect()->route('operations.index', [$request])->with('success', "New Security Analysis created for Operation $securityAnalysis->operation_id");
    }

    public function generate(SecurityAnalysis $securityAnalysis)
    {

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return \Illuminate\Http\Response
     */
    public function show(SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecurityAnalysis $securityAnalysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SecurityAnalysis  $securityAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecurityAnalysis $securityAnalysis)
    {
        //
    }
}
