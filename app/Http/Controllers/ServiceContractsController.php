<?php

namespace App\Http\Controllers;

use App\ServiceContract;
use Illuminate\Http\Request;
use App\ClientApplication;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Events\ServiceContracts\ServiceContractGenerated;
use PDF;
use Storage;
use Illuminate\Filesystem\Filesystem;

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
        $this->authorize(ServiceContract::class, 'create');
        $clientApplication = ClientApplication::find($request->input('ref_id'));
        $serviceAgreement = DB::table('agreements')->value('service_agreement');
        $privacyPolicy = DB::table('agreements')->value('privacy_policy');
        strip_tags($serviceAgreement, '<p>, <br>, <b>, <u>');
        strip_tags($privacyPolicy, '<p>, <br>, <b>, <u>');
        $serviceContract = new ServiceContract();
        $serviceContract->parent_ref_id = $clientApplication->ref_id;
        $serviceContract->control_number = 'AACN' . rand(10000000000000,99999999999999);
        $serviceContract->name = strToLower(str_replace([' ', '/'], '_', $clientApplication->getName() . '_' . $clientApplication->ref_id));
        $serviceContract->email = $clientApplication->email;
        $serviceContract->privacy_policy = 0;
        $serviceContract->service_agreement = 0;
        $serviceContract->save();

        $pdf = PDF::loadView('pdf.invoice', [
            'serviceContract' => $serviceContract,
            'breakdownLists' => $clientApplication->breakdownLists,
            'serviceAgreement' => $serviceAgreement,
            'privacyPolicy' => $privacyPolicy,
            'activeControlNumber' => $clientApplication->active_control_number,
            ])->output();

        Storage::disk('local')->put('pdfs/' . $serviceContract->email . '/' . $serviceContract->clientApplication->ref_id . '/' . $serviceContract->name . '.pdf', $pdf);
        \Mail::to($clientApplication->email)->queue(new \App\Mail\ServiceContracts\Created($serviceContract));
        $clientApplication->active_control_number = $serviceContract->control_number;
        $clientApplication->save();

        event(new ServiceContractGenerated($serviceContract));

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
        $this->authorize('download', $serviceContract);
        return Storage::disk('local')->download('pdfs/' . $serviceContract->email . '/' . $serviceContract->clientApplication->ref_id . '/' . $serviceContract->name . '.pdf');
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
