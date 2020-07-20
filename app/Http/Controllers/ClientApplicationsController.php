<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\ClientApplication;
use App\ClientApplicationComment;
use App\User;
use App\BreakdownList;
use App\BreakdownItem;
use Ramsey\Uuid\Uuid;
use App\Mail\ClientApplicationSubmitted;
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
            'first_name' => 'required',
            'email' => 'required',
            'project_type' => 'required',
        ]);
        
        $user = auth()->user();
        $clientapplication = new ClientApplication;
        $clientapplication->first_name = $request->input('first_name');
        $clientapplication->last_name = $request->input('last_name');
        $clientapplication->company_name = $request->input('company_name');
        $clientapplication->email = $request->input('email');
        $clientapplication->phone_number = $request->input('phone_number');
        $clientapplication->project_type = $request->input('project_type');
        $clientapplication->existing_site = $request->input('existing_site');
        $clientapplication->site_type = $request->input('site_type');
        $clientapplication->gov_contract = $request->input('gov_contract');
        $clientapplication->where_hosted = $request->input('where_hosted');
        $clientapplication->site_url = $request->input('site_url');
        $clientapplication->backend_type = $request->input('backend_type');
        $clientapplication->backend_framework = $request->input('backend_framework');
        $clientapplication->frontend_framework = $request->input('frontend_framework');
        $clientapplication->backend_framework_type = $request->input('backend_framework_type');
        $clientapplication->frontend_framework_type = $request->input('frontend_framework_type');
        $clientapplication->is_platform = $request->input('is_platform');
        $clientapplication->platform_type = $request->input('platform_type');
        $clientapplication->db_type = $request->input('db_type');
        $clientapplication->test_scope = $request->input('test_scope');
        $clientapplication->security_incidents = $request->input('security_incidents');
        $clientapplication->legacy_backend_type = $request->input('legacy_backend_type');
        $clientapplication->new_or_existing_app = $request->input('new_or_existing_app');
        $clientapplication->app_store = $request->input('app_store');
        $clientapplication->project_description = $request->input('project_description');
        if($user){$clientapplication->user_id = $user->id;}
        $clientapplication->ref_id = mt_rand(100000000000000,999999999999999);
        $clientapplication->auth_code = Uuid::uuid4();
        $clientapplication->auth_code = Hash::make($clientapplication->auth_code);
        $clientapplication->save();
        
        if(!$user)
        {
        return redirect()->route('index')->with("success", "your project 
        has successfully been submitted to the Client Assessment Bureau. You will hear 
        back from us within one business day. A copy of your submission has been 
        sent to $clientapplication->email for your records. It's important that 
        you retain the Reference ID and Authorization Code included if you wish to 
        add this project to an account if you create one later.");
        }
        else{
            return redirect()->route('index')->with("success", "$user->name, Your project 
            has successfully been submitted to the Client Assessment Bureau. You will hear 
            back from us within one business day. A copy of your submission has 
            been sent to $clientapplication->email for your records. It's 
            important that you retain the Reference ID and Authorization Code for 
            your records.");
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
        $breakdownitems = BreakdownItem::where(['parent_ref_id' => $ref_id])->get();
        $count = 1;
        return view('clientapplications/show')->with([
            'clientapplication' => $clientapplication,
            'ref_id' => $ref_id,
            'comments' => $comments,
            'breakdownitems' => $breakdownitems,
            'count' => $count
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
        $clientapplication = ClientApplication::find($ref_id);
        $clientapplication->first_name = $request->input('first_name');
        $clientapplication->last_name = $request->input('last_name');
        $clientapplication->company_name = $request->input('company_name');
        $clientapplication->email = $request->input('email');
        $clientapplication->phone_number = $request->input('phone_number');
        $clientapplication->project_type = $request->input('project_type');        
        $clientapplication->existing_site = $request->input('existing_site');
        $clientapplication->site_type = $request->input('site_type');
        $clientapplication->gov_contract = $request->input('gov_contract');
        $clientapplication->where_hosted = $request->input('where_hosted');
        $clientapplication->site_url = $request->input('site_url');
        $clientapplication->backend_type = $request->input('backend_type');
        $clientapplication->backend_framework = $request->input('backend_framework');
        $clientapplication->frontend_framework = $request->input('frontend_framework');
        $clientapplication->backend_framework_type = $request->input('backend_framework_type');
        $clientapplication->frontend_framework_type = $request->input('frontend_framework_type');
        $clientapplication->is_platform = $request->input('is_platform');
        $clientapplication->platform_type = $request->input('platform_type');
        $clientapplication->db_type = $request->input('db_type');
        $clientapplication->test_scope = $request->input('test_scope');
        $clientapplication->security_incidents = $request->input('security_incidents');
        $clientapplication->legacy_backend_type = $request->input('legacy_backend_type');
        $clientapplication->new_or_existing_app = $request->input('new_or_existing_app');
        $clientapplication->app_store = $request->input('app_store');
        $clientapplication->project_description = $request->input('project_description');
        $clientapplication->project_status = $request->input('project_status');
        $clientapplication->save();

        return redirect()->route('clientapplications.show', [$clientapplication->ref_id])->with('success', "Client information updated successfully!");
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
        if($clientapplication->user){
        $clientapplication->user->user_balance -= $clientapplication->project_balance;
        $clientapplication->user->save();}

        $clientapplication->delete();
        return redirect()->route('dashboard')->with('success', 'Your project has successfully been deleted.');
    }

    public function appendto(Request $request){
        $this->validate($request, ['ref_id' => 'required', 'auth_code' => 'required']);
        $user = auth()->user();
        $ref_id = $request->input('ref_id');
        $auth_code = $request->input('auth_code');
        $user_id = auth()->user()->id;
        $clientapplication = ClientApplication::find($ref_id);

        if(isset($clientapplication)){
            if($clientapplication->ref_id == $ref_id && $clientapplication->auth_code == Hash::check($auth_code, $clientapplication->auth_code))
            {
                $clientapplication->user_id = $user_id;
                $clientapplication->save();
                
                return redirect()->route('dashboard')->with('success', "Congratulations $user->first_name, $ref_id has been successfully added to your account.");
            }
        else{
            return redirect()->route('dashboard')->with('error', "Project $ref_id does not exist.");
        }
    }
    }

    public function revokeall(){
        $user = auth()->user();
        $clientapplications = ClientApplication::where('user_id', $user->id)->get();
        if(count($clientapplications) > 0)
        {
        $clientapplications->each->updateAuthCode();

        Mail::to($user->email)
        ->queue(new AuthCodesChanged($clientapplications));

            return redirect()->route('dashboard')->with('success', "All of your authorization codes have been reset and e-mailed 
            to you $user->email. Security is our top priority!");
        }
            else
            {
            return redirect()->route('dashboard')->with('error', "You have no projects associated with your account, and therefore no auth
            codes to revoke.");
            }
    }

}
