<?php

namespace App\Http\Controllers;

use App\ServiceContract;
use Illuminate\Http\Request;
use App\ClientApplication;
use Illuminate\Support\Facades\DB;

class ServiceContractsController extends Controller
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
        $clientApplication = ClientApplication::find($request->input('ref_id'));
        $serviceAgreement = DB::table('agreements')->value('service_agreement');
        $privacyPolicy = DB::table('agreements')->value('privacy_policy');
        $breakdownItems = $clientApplication->breakdownItems;
        $serviceContract = new ServiceContract();
        $serviceContract->parent_ref_id = $clientApplication->ref_id;
        $serviceContract->name = strToLower(str_replace(' ', '_', $clientApplication->getName()) . '_' . str_replace(' ', '_', $clientApplication->project_type) . '_' . 'service_contract' . '_' . now());
        $serviceContract->service_agreement = $serviceAgreement;
        $serviceContract->privacy_policy = $privacyPolicy;
        $serviceContract->save();

        return redirect()->route('clientapplications.show', [$clientApplication->ref_id])->with('success', 'Service contract generated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceContract  $serviceContract
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceContract  $serviceContract
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceContract  $serviceContract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceContract $serviceContract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceContract  $serviceContract
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceContract $serviceContract)
    {
        //
    }
}
