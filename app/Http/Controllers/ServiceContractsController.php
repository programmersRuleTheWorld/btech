<?php

namespace App\Http\Controllers;

use App\ServiceContract;
use Illuminate\Http\Request;
use App\ClientApplication;
use Illuminate\Support\Facades\DB;
use App\Events\ServiceContracts\ServiceContractGenerated;
use PDF;
use Storage;
use Illuminate\Filesystem\Filesystem;

class ServiceContractsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ServiceContract::class, 'App\ServiceContract');
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
        $clientApplication = ClientApplication::find($request->input('ref_id'));
        $serviceAgreement = strip_tags(DB::table('agreements')->value('service_agreement'), '<p>, <br>, <b>, <u>');
        $privacyPolicy = strip_tags(DB::table('agreements')->value('privacy_policy'),  '<p>, <br>, <b>, <u>');
        $breakdownItems = $clientApplication->breakdownItems;
        $serviceContract = new ServiceContract();
        $serviceContract->parent_ref_id = $clientApplication->ref_id;
        $serviceContract->control_number = 'AACN' . rand(10000000000000,99999999999999);
        $serviceContract->name = strToLower(str_replace([' ', '/'], '_', $clientApplication->getName() . '_' . $clientApplication->project_type . '_' . 'service_contract' . '_' . now()));
        $serviceContract->service_agreement = $serviceAgreement;
        $serviceContract->privacy_policy = $privacyPolicy;
        $serviceContract->save();
        $pdf = PDF::loadView('pdf.invoice', [
            'serviceContract' => $serviceContract,
            'breakdownItems' => $breakdownItems
            ])->output();
        Storage::disk('local')->makeDirectory('pdfs/' . $serviceContract->clientApplication->email);
        Storage::disk('local')->put('pdfs/' . $serviceContract->clientApplication->email . '/' . $serviceContract->name . '.pdf', $pdf);

        return redirect()->route('clientapplications.show', [$clientApplication->ref_id])->with('success', 'Service contract generated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceContract  $serviceContract
     * @return \Illuminate\Http\Response
     */
    public function show($serviceContract)
    {
        $serviceContract = ServiceContract::find($serviceContract);
        $pdf = PDF::stream("pdfs/$serviceContract->clientApplication->email/$serviceContract->name.pdf", array('Attachment' => 0));

    }

    public function download($serviceContract)
    {
        $serviceContract = ServiceContract::find($serviceContract);
        return Storage::disk('local')->download('pdfs/' . $serviceContract->clientApplication->email . '/' . $serviceContract->name . '.pdf');
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
