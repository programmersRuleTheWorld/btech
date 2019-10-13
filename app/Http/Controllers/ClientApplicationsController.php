<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ClientApplication;
use App\ClientApplicationComment;
use App\User;
use App\Mail\ClientApplicationSubmitted;
use Ramsey\Uuid\Uuid;
use Mail;

class ClientApplicationsController extends Controller
{
    public $clientapplication;

    public function __construct(){
        $this->middleware('verified', ['except' => ['store']]);
        $this->middleware('auth', ['except' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        
        $user = auth()->user();
        $clientapplication = new ClientApplication;
        $clientapplication->name = $request->input('name');
        $clientapplication->company = $request->input('company');
        $clientapplication->email = $request->input('email');
        $clientapplication->number = $request->input('number');
        $clientapplication->selection = $request->input('selection');
        $clientapplication->project = $request->input('project');
        if($user){$clientapplication->user_id = $user->id;}
        $clientapplication->ref_id = mt_rand(100000000000000,999999999999999);
        $clientapplication->auth_code = Uuid::uuid4();
        $clientapplication->save();
        
        Mail::to($clientapplication->email)
        ->send(new ClientApplicationSubmitted($clientapplication));

        if(!$user){
        return redirect()->route('index')->with("success", "Your project has successfully been submitted. You will hear
        back from us within one business day. A copy of your submission has been sent to $clientapplication->email for your 
        records. It's important that you retain the Reference ID and Authorization Code included if you wish to add
        this project to an account if you create one later.");
        }
        else{
            return redirect()->route('index')->with("success", "$user->name, your project has successfully been submitted. You will hear
        back from us within one business day. A copy of your submission has been sent to $clientapplication->email for your 
        records. It's important that you retain the Reference ID and Authorization Code for your records.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ref_id)
    {
        $clientapplication = ClientApplication::find($ref_id);
        $comments = ClientApplicationComment::where(['parent_ref_id' => $ref_id])->get();
        
        return view('clientapplications/show')->with([
            'clientapplication' => $clientapplication,
            'ref_id' => $ref_id,
            'comments' => $comments
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ref_id)
    {
        $clientapplication = ClientApplication::find($ref_id);
        return view('clientapplications/edit')->with('clientapplication', $clientapplication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'selection' => 'required',
            'project' => 'required',
            'status' => 'required'
        ]);
        
        $clientapplication = ClientApplication::find($ref_id);
        $clientapplication->name = $request->input('name');
        $clientapplication->company = $request->input('company');
        $clientapplication->number = $request->input('number');
        $clientapplication->email = $request->input('email');
        $clientapplication->selection = $request->input('selection');
        $clientapplication->project = $request->input('project');
        $clientapplication->status = $request->input('status');
        $clientapplication->save();

        return redirect()->route('clientapplications.show', [$clientapplication->ref_id])->with('success', "Client information updated successfully.");
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
        $clientapplication->forceDelete();
        return redirect()->route('dashboard')->with('success', 'Your project has successfully been deleted.');
    }

    public function appendto(Request $request){
        $this->validate($request, ['ref_id' => 'required', 'auth_code' => 'required']);
        $ref_id = $request->input('ref_id');
        $auth_code = $request->input('auth_code');
        $user_id = auth()->user()->id;
        $clientapplication = ClientApplication::find($ref_id);
        if($clientapplication){
            if($clientapplication->ref_id == $ref_id && $clientapplication->auth_code == $auth_code)
            {
                $clientapplication->user_id = $user_id;
                return redirect()->route('dashboard')->with('success', "Project $ref_id has been successfully added to your account.");
            }
            elseif($clientapplication->ref_id == $ref_id && $clientapplication->auth_code != $auth_code){
                return redirect()->route('dashboard')->with('error', "Please make sure you have entered your Authorization Code correctly.");
            }
        }
        else{
            return redirect()->route('dashboard')->with('error', "Project $ref_id does not exist.");
        }


    }

    public function revokeall(){
        $user = auth()->user();
        $clientapplication = ClientApplication::where('user_id', $user->id)->get();
        if(count($clientapplication) > 0)
        {
        $clientapplication->each->updateAuthCode();
            return redirect()->route('dashboard')->with('success', "All of your authorization codes have been reset and e-mailed to you.
            Security is our top priority!");
        }
            else
            {
            return redirect()->route('dashboard')->with('error', "You have no projects associated with your account, and therefore no auth
            codes to revoke.");
            }
    }
}
