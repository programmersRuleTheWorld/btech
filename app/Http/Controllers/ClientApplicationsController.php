<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ClientApplication;
use App\User;
use App\Mail\ClientApplicationSubmitted;
use Ramsey\Uuid\Uuid;
use Mail;

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
        $clientapplication->ref_id = mt_rand(100000000000000,999999999999999);
        $clientapplication->auth_code = Uuid::uuid4();
        $clientapplication->save();

        Mail::to($clientapplication->email)
        ->send(new ClientApplicationSubmitted($clientapplication));

        return redirect()->route('index')->with("success", "Your project has successfully been submitted. You will hear
        back from us within one business day. A copy of your submission has been sent to $clientapplication->email for your 
        records. It's important that you retain the reference ID and confirmation numbers included if you wish to add
        this project to an account if you create one later.");
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
    public function update(Request $request, $ref_id)
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

    public function appendto(Request $request){
        $this->validate($request, ['ref_id' => 'required', 'auth_code' => 'required']);
        $ref_id = $request->input('ref_id');
        $auth_code = $request->input('auth_code');
        $user_id = auth()->user()->id;
        if(DB::table('client_applications')->where('ref_id', $ref_id)->orWhere('auth_code', $auth_code)->exists())
        {
            if(DB::table('client_applications')->where(['ref_id' => $ref_id, 'auth_code' => $auth_code])->exists())
            {
                DB::table('client_applications')->where(['ref_id' => $ref_id, 'auth_code' => $auth_code])->update(['user_id' => $user_id]);
                return redirect()->route('dashboard')->with('success', "Project $ref_id has been successfully added to your account!");
            }
            elseif(DB::table('client_applications')->where('ref_id', '!=', $ref_id)->where('auth_code', $auth_code)->exists())
            {
                return redirect()->route('dashboard')->with('error', "Please ensure you've entered your Reference ID correctly and try again.");
            }
            elseif(DB::table('client_applications')->where('ref_id', $ref_id)->where('auth_code', '!=', $auth_code)->exists())
            {
                return redirect()->route('dashboard')->with('error', "Please ensure you've entered your Authorization Code correctly and try again.");
            }
        }
        else
        {
            return redirect()->route('dashboard')->with('error', "Project $ref_id does not fucking exist.");
        }

    }

    public function removefrom($ref_id){
        $clientapplication = ClientApplication::find($ref_id);
        $clientapplication->update(['user_id' => NULL]);
        return redirect()->route('dashboard')->with('success', 'Your project has successfully been removed from your account.');
    }

    public function revokeall(){
        $user = auth()->user();
        if(ClientApplication::where(['user_id' => $user->id])->exists())
        {
            $clientapplication = ClientApplication::where(['user_id' => $user->id])->update(['auth_code' => Uuid::uuid4()]);
            return redirect()->route('dashboard')->with('success', "All of your authorization codes have been reset and e-mailed to you.
            Security is our top priority!");
        }
            else
                {
                return redirect()->route('dashboard')->with('error', "You have no projects associated with your account, and therefore no auth
                codes to revoke.");
                }

            /*      Pre-transition Query Builder code  
                    if(DB::table('client_applications')->where(['user_id' => $user->id])->exists())
        {
        DB::table('client_applications')->update(['auth_code' => Uuid::uuid4()]);
        return redirect()->route('dashboard')->with('success', "All of your authorization codes have been reset and e-mailed to you.
        Security is our top priority!");
        }
        else
        {
        return redirect()->route('dashboard')->with('error', "You have no projects associated with your account, and therefore no auth
        codes to revoke.");
        }
            */
    }
}
