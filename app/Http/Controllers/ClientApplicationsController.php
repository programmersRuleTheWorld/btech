<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientApplication;
use App\Mail\ClientApplicationSubmitted;

class ClientApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientapplication = ClientApplication::with('user')->get();
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
            'name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'selection' => 'required',
            'project' => 'required'
        ]);

        $clientapplication = new ClientApplication;
        $clientapplication->name = $request->input('name');
        $clientapplication->company = $request->input('company');
        $clientapplication->email = $request->input('email');
        $clientapplication->number = $request->input('number');
        $clientapplication->selection = $request->input('selection');
        $clientapplication->project = $request->input('project');
        if(auth()->check()){$clientapplication->user_id = auth()->user()->id;}
        $clientapplication->ref_id = rand(100000000,999999999);
        $clientapplication->save();

        \Mail::to($clientapplication->email)
        ->send(new ClientApplicationSubmitted($clientapplication));

        return redirect()->route('index')->with("success", "Your project has successfully been submitted. You will hear
        back from us within one business day! Please retain this reference number for your records, in case you
        wish to link this to an account later: $clientapplication->ref_id. A copy of your submission has been sent to $clientapplication->email for your records.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ref_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ref_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $ref_id, $request)
    {
     //   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ref_id)
    {
        $clientapplication = ClientApplication::find($ref_id);
        $clientapplication->delete();
        return redirect()->route('dashboard')->with('success', 'Your project has successfully been deleted.');
    }

    public function appendrefid(Request $request, $ref_id){
        $validatedData = $this->validate($request, [
            'updatedrefid' => 'required'
        ]);

        /* ----- Study eloquent collections to create appendRefId later
        
        $updatedRefId = $validatedData;
        ClientApplication::find($updatedRefId)->*/

    }
}
