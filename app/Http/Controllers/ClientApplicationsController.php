<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth;
use App\ClientApplication;
use App\ClientApplicationComment;
use App\User;
use App\BreakdownList;
use App\BreakdownItem;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use App\ServiceContract;
use PDF;

class ClientApplicationsController extends Controller
{    
    public function __construct()
    {
        //$this->authorizeResource(ClientApplication::class, 'clientapplication');
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
        $clientApplication = new ClientApplication;
        $clientApplication->first_name = $request->input('first_name');
        $clientApplication->last_name = $request->input('last_name');
        $clientApplication->company_name = $request->input('company_name');
        $clientApplication->email = $request->input('email');
        $clientApplication->phone_number = $request->input('phone_number');
        $clientApplication->project_type = $request->input('project_type');
        $clientApplication->existing_site = $request->input('existing_site');
        $clientApplication->site_type = $request->input('site_type');
        $clientApplication->gov_contract = $request->input('gov_contract');
        $clientApplication->where_hosted = $request->input('where_hosted');
        $clientApplication->site_url = $request->input('site_url');
        $clientApplication->backend_type = $request->input('backend_type');
        $clientApplication->backend_framework = $request->input('backend_framework');
        $clientApplication->frontend_framework = $request->input('frontend_framework');
        $clientApplication->backend_framework_type = $request->input('backend_framework_type');
        $clientApplication->frontend_framework_type = $request->input('frontend_framework_type');
        $clientApplication->is_platform = $request->input('is_platform');
        $clientApplication->platform_type = $request->input('platform_type');
        $clientApplication->db_type = $request->input('db_type');
        $clientApplication->test_scope = $request->input('test_scope');
        $clientApplication->security_incidents = $request->input('security_incidents');
        $clientApplication->legacy_backend_type = $request->input('legacy_backend_type');
        $clientApplication->new_or_existing_app = $request->input('new_or_existing_app');
        $clientApplication->app_store = $request->input('app_store');
        $clientApplication->project_description = $request->input('project_description');
        if($user){$clientApplication->user_id = $user->id;}
        $clientApplication->ref_id = mt_rand(100000000000000,999999999999999);
        $clientApplication->auth_code = Uuid::uuid4();
        $clientApplication->auth_code = Hash::make($clientApplication->auth_code);
        $clientApplication->save();
        
        if(!$user)
        {
        return redirect()->route('index')->with("success", "your project 
        has successfully been submitted to the Client Assessment Bureau. You will hear 
        back from us within one business day. A copy of your submission has been 
        sent to $clientApplication->email for your records. It's important that 
        you retain the Reference ID and Authorization Code included if you wish to 
        add this project to an account if you create one later.");
        }
        else{
            return redirect()->route('index')->with("success", "$user->name, Your project 
            has successfully been submitted to the Client Assessment Bureau. You will hear 
            back from us within one business day. A copy of your submission has 
            been sent to $clientApplication->email for your records. It's 
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
    public function show($clientApplication)
    {
        $user = auth()->user();
        $clientApplication = ClientApplication::find($clientApplication);
        $this->authorize('view', $clientApplication);
        $clientApplicationComments = ClientApplicationComment::where(['parent_ref_id' => $clientApplication->ref_id])->get();
        $breakdownItems = BreakdownItem::where(['parent_ref_id' => $clientApplication->ref_id])->get();
        $serviceContracts = ServiceContract::where(['parent_ref_id' => $clientApplication->ref_id])->get();
        $count = 1;
        return view('clientapplications/show')->with([
            'clientApplication' => $clientApplication,
            'ref_id' => $clientApplication->ref_id,
            'clientApplicationComments' => $clientApplicationComments,
            'breakdownItems' => $breakdownItems,
            'serviceContracts' => $serviceContracts,
            'count' => $count,
            'user' => $user,
            'serviceContracts' => $serviceContracts
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($clientApplication)
    {
        $clientApplication = ClientApplication::find($clientApplication);
        $this->authorize('update', $clientApplication);
        return view('clientapplications/edit')->with('clientApplication', $clientApplication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientApplication)
    {        
        $clientApplication = ClientApplication::find($clientApplication);
        $this->authorize('update', $clientApplication);
        $clientApplication->first_name = $request->input('first_name');
        $clientApplication->last_name = $request->input('last_name');
        $clientApplication->company_name = $request->input('company_name');
        $clientApplication->email = $request->input('email');
        $clientApplication->phone_number = $request->input('phone_number');
        $clientApplication->project_type = $request->input('project_type');        
        $clientApplication->existing_site = $request->input('existing_site');
        $clientApplication->site_type = $request->input('site_type');
        $clientApplication->gov_contract = $request->input('gov_contract');
        $clientApplication->where_hosted = $request->input('where_hosted');
        $clientApplication->site_url = $request->input('site_url');
        $clientApplication->backend_type = $request->input('backend_type');
        $clientApplication->backend_framework = $request->input('backend_framework');
        $clientApplication->frontend_framework = $request->input('frontend_framework');
        $clientApplication->backend_framework_type = $request->input('backend_framework_type');
        $clientApplication->frontend_framework_type = $request->input('frontend_framework_type');
        $clientApplication->is_platform = $request->input('is_platform');
        $clientApplication->platform_type = $request->input('platform_type');
        $clientApplication->db_type = $request->input('db_type');
        $clientApplication->test_scope = $request->input('test_scope');
        $clientApplication->security_incidents = $request->input('security_incidents');
        $clientApplication->legacy_backend_type = $request->input('legacy_backend_type');
        $clientApplication->new_or_existing_app = $request->input('new_or_existing_app');
        $clientApplication->app_store = $request->input('app_store');
        $clientApplication->project_description = $request->input('project_description');
        $clientApplication->project_status = $request->input('project_status');
        $clientApplication->save();

        return redirect()->route('clientapplications.show', [$clientApplication->ref_id])->with('success', "Client information updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientApplication)
    {
        $clientApplication = ClientApplication::find($clientApplication);
        $this->authorize('delete', $clientApplication);
        if($clientApplication->user)
        {
        $clientApplication->user->user_balance -= $clientApplication->project_balance;
        $clientApplication->user->save();
        }
        $clientApplication->delete();
        
        return redirect()->route('dashboard')->with('success', 'Your project has successfully been deleted.');
    }

    public function appendTo(Request $request){

        $user = auth()->user();
        $clientApplication = $request->input('ref_id');
        $clientApplication = ClientApplication::find($clientApplication);
        $this->validate($request, ['ref_id' => 'required', 'auth_code' => 'required']);
        $auth_code = $request->input('auth_code');
        $user_id = auth()->user()->id;
        

        if(isset($clientApplication)){
            if($clientApplication->ref_id == $clientApplication && $clientApplication->auth_code == Hash::check($auth_code, $clientApplication->auth_code))
            {
                $clientApplication->user_id = $user_id;
                $clientApplication->save();
                
                return redirect()->route('dashboard')->with('success', "$user->first_name, $clientApplication has been successfully added to your account.");
            }
        }
        else{
            return redirect()->route('dashboard')->with('error', "Project $request->ref_id does not exist.");
        }
    }

    public function revokeAll(){
        $user = auth()->user();
        $clientApplications = ClientApplication::where('user_id', $user->id)->get();
        if(count($clientApplications) > 0)
        {
            foreach($clientApplications as $clientApplication)
            {
                $this->authorize('revokeAll', $clientApplication);
                $clientApplication->updateAuthCode();
            }

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
