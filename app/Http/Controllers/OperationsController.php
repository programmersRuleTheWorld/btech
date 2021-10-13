<?php

namespace App\Http\Controllers;

use App\Operation;
use App\ClientApplication;
use App\SupportTicket;
use App\Events\Operations\OperationUpdated;
use Illuminate\Http\Request;

class OperationsController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Operation::class, 'operation');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $operations = Operation::where(['parent_ref_id' => $request->input('ref_id')])->get();
        
        return view('operations.index')->with('operations', $operations);
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
        $user = auth()->user();
        $clientApplication = ClientApplication::findOrFail($ref_id = $request->input('ref_id'));
        $operation = new Operation();
        switch($clientApplication->project_type)
        {
            case $clientApplication->project_type == 'Web Design/Development':$operation->operation_type = 'Website Administration';
            case $clientApplication->project_type == 'Mobile App':$operation->operation_type = 'Mobile App API';
            case $clientApplication->project_type == 'Security Analysis':$operation->operation_type = 'Security Analysis';
        }
        $operation->parent_ref_id = $clientApplication->ref_id;
        if(isset($clientApplication->user_id))
        {
        $operation->user_id = $clientApplication->user->id;
        }
        else
        {
            $operation->user_id = null;
        }
        $operation->save();

        return redirect()->back()->with('success', "A new operations instance has been created for Client Application $clientApplication->ref_id.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        return view('operations.show')->with(['operation' => $operation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        $operation->domain_host = $request->input('domain_host');
        $operation->server_host = $request->input('server_host');
        $operation->public_ip = $request->input('public_ip');
        $operation->server_type = $request->input('server_type');
        $operation->domain_name = $request->input('domain_name');
        $operation->uptime_status = $request->input('uptime_status');
        $operation->payment_status = $request->input('payment_status');
        $operation->save();
        
        return redirect()->route('dashboard')->with('success', "Operation successfully updated for Client Application $operation->parent_ref_id.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
