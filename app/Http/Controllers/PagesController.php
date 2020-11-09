<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Post;
use App\User;
use App\AffiliateCampaign;
use App\ClientApplication;
use App\SupportTicket;
use App\Operation;
use App\BreakdownList;
use Feeds;
use App\Role;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('verified', ['except' => ['index', 'services', 'about', 'contact', 'privacy', 'service_agreement', 'blog', 'affiliate']]);
    }
    
    public function index(){
        $user = auth()->user();
        $posts = Post::latest()->take(3)->with('user')->get();
        
        $feed = Feeds::make('https://www.techrepublic.com/rssfeeds/topic/security/?feedType=rssfeeds');
        $feed->set_image_handler('handler_image.php','image');
        $feed->set_cache_location('mysql://root:root@localhost:3306/btech?prefix=sp_');
        $feed->handle_content_type();
        $feed->init();      

            $items = $feed->get_items(0,10);
            
            return view('pages.index')->with(
            [
                'posts' => $posts,
                'user' => $user,
                'feed' => $feed,
                'items' => $items,
                ]
            );
    }
    
    public function about()
    {
        return view('pages.about');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }
    
    public function blog()
    {
        $posts = Post::all();
        return view('posts/index')->with(['posts' => $posts]);
    }

    public function services()
    {
        return view('pages.services');
    }

    public function privacy_policy()
    {
        $privacyPolicy = DB::table('agreements')->value('privacy_policy');
        return view('pages.privacy_policy')->with('privacyPolicy', $privacyPolicy);
    }

    public function service_agreement()
    {
        $serviceAgreement = DB::table('agreements')->value('service_agreement');
        return view('pages.service_agreement')->with('service_agreement', $serviceAgreement
    );
    }

    public function affiliate_details()
    {
        $user = auth()->user();
        $affiliateCampaigns = AffiliateCampaign::where('affiliate_id', $user->affiliate_id)->get();
        $completedProjects = 0;
        foreach($affiliateCampaigns as $affiliateCampaign)
        {
            $completedProjects =+ ClientApplication::where(['project_status' => "follow-up", 'user_id' => $affiliateCampaign->referred_user_id])->count();
        }

        return view('pages.affiliate_details')->with([
            'affiliateCampaigns' => $affiliateCampaigns,
            'user' => $user,
            'completedProjects' => $completedProjects,
        ]);
    }

    public function development_center(Request $request)
    {
        $user = auth()->user();
        if(Gate::forUser($user)->allows('show-development'))
        {
        $user = auth()->user();
        $clientApplications = ClientApplication::paginate(5, ['*'], 'jobs');
        return view('pages.development_center')->with([
            'clientApplications' => $clientApplications,
        ]);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', "You are not permitted to access this resource. This attempt has been logged.");
        }
    }

    public function operations_center()
    {
        $user = auth()->user();
        if(Gate::forUser($user)->allows('show-operations'))
        {
        $operations = Operation::paginate(5, ['*'], 'operations');

        return view('pages.operations_center')->with([
            'operations' => $operations,
        ]);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', 'You are not permitted to access this resource. This attempt has been logged.');
        }
    }

    public function client_application_deposit(Request $request, $clientApplication)
    {
        $user = auth()->user();
        $selectedList = null;
        $breakdownLists = BreakdownList::where(['parent_ref_id' => $clientApplication->ref_id, ['list_deposit', '>', 0]])->get();
        $clientApplication = ClientApplication::find($clientApplication);

        \Stripe\Stripe::setApiKey('sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX');
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $clientApplication->project_deposit * 100,
            'currency' => 'usd',
            'customer' => $user->stripe_id,
            'payment_method_types' => ['card'],
            'receipt_email' => $user->email,
            'description' => "Bertram Technologies Deposit",
            ]);


        return view('clientapplications.include.payment')->with([
            'clientApplication' => $clientApplication,
            'selectedList' => $selectedList,
        ]);
    }

    public function client_application_payment(Request $request, $clientApplication)
    {
        $user = auth()->user();
        $selectedList = $request->input('selected_value');
        $clientApplication = ClientApplication::find($clientApplication);
        $breakdownLists = BreakdownList::where(['parent_ref_id' => $clientApplication->ref_id])->get();

        if(BreakdownList::find($selectedList) != null)
        {
            $selectedList = BreakdownList::find($selectedList);
            if($selectedList->list_deposit > 0.00)
            {
        \Stripe\Stripe::setApiKey('sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX');
        $intent = \Stripe\PaymentIntent::create([
            'amount' => $selectedList->list_balance * 100,
            'currency' => 'usd',
            'customer' => $user->stripe_id,
            'payment_method_types' => ['card'],
            'receipt_email' => $user->email,
            'description' => "Bertram Technologies Balance",
            ]);

            return view('clientapplications.include.payment')->with([
            'clientApplication' => $clientApplication, 
            'breakdownLists' => $breakdownLists,
            'selectedList' => $selectedList,
            'intent' => $intent,
            ]);
        }
        else
        {
            return view('clientapplications.include.payment')->with([
                'clientApplication' => $clientApplication, 
                'breakdownLists' => $breakdownLists,
                'selectedList' => $selectedList,
            ]);
        }
        }
        else
        {
            return view('clientapplications.include.payment')->with([
            'clientApplication' => $clientApplication, 
            'breakdownLists' => $breakdownLists,
            'selectedList' => null,
            ]);
        }
    }

    public function admin()
    {
        $user = auth()->user();
        if(Gate::forUser($user)->allows('show-admin'))
        {
        $count = 1;
        $users = User::paginate('10', ['*'], 'users');
        $supports = ClientApplication::where(['support' => true])->get();
        $vulnerabilities = ClientApplication::where(['vulnerability' => true])->get();
        $bugs = ClientApplication::where(['bug' => true])->get();
        $roles = Role::all();

        return view('pages.admin')->with([
            'users' => $users,
            'supports' => $supports,  
            'vulnerabilities' => $vulnerabilities,
            'count' => $count,
            'roles' => $roles,          
            'bugs' => $bugs,
        ]);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', 'You are not permitted to access this resource. This attempt has been logged.');
        }
    }
    
}
