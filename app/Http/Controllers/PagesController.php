<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Post;
use App\User;
use App\AffiliateCampaign;
use App\ClientApplication;
use App\SupportTicket;
use App\Transaction;
use App\Operation;
use App\BreakdownItem;
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
        /*
        $posts = Post::latest()->take(3)->with('user')->get();
        $feed = Feeds::make('https://www.techrepublic.com/rssfeeds/topic/security/?feedType=rssfeeds');
        $feed->set_image_handler('handler_image.php','image');
        $feed->set_cache_location('mysql://root:root@localhost:3306/btech?prefix=sp_');
        $feed->handle_content_type();
        $feed->init();      

            $items = $feed->get_items(0,6);
            */
            return view('pages.index')->with(
            [
//                'posts' => $posts,
                'user' => $user,
                //'feed' => $feed,
//                'items' => $items,
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
            $completedProjects = ClientApplication::where(['project_status' => "complete", 'user_id' => $affiliateCampaign->referred_user_id])->count();
        }

        return view('pages.affiliate_details')->with([
            'affiliateCampaigns' => $affiliateCampaigns,
            'user' => $user,
            'completedProjects' => $completedProjects,
        ]);
    }

    public function client_application_payment(Request $request)
    {
        $user = auth()->user();
        $clientApplication = ClientApplication::find($request->clientApplication);

        if($clientApplication->payment_status == 'deposit')
        {
            return redirect()->route('client_application_deposit', [$clientApplication])->with('error', "You entered the payment page but there are no payments payable, You are now on the deposits page. Please see your outstanding balances.");
        }

        $breakdownLists = BreakdownList::where('parent_ref_id', $clientApplication->ref_id)
        ->where('list_balance', '>', 0)->get();

        $breakdownLists = $breakdownLists->filter(function($breakdownList)
        {
            $breakdownItems = $breakdownList->breakdownItems->filter(function($breakdownItem)
            {
                $transactions = $breakdownItem->transactions->filter(function($transaction)
                {
                    return $transaction->transaction_type == 'payment';
                });
                return $breakdownItem->item_balance > 0 && $breakdownItem->item_balance > $transactions->sum('transaction_amount');
            });
            $breakdownList->breakdownItems = $breakdownItems;
            return $breakdownList->breakdownItems->count() > 0;
        });

        $breakdownLists->transform(function($breakdownList)
        {            
            $breakdownList->breakdownItems->transform(function($breakdownItem)
            {
                $transactions = $breakdownItem->transactions->whereIn('transaction_type', ['payment']);
                $breakdownItem->item_balance -= $transactions->sum('transaction_amount');
                return $breakdownItem;
            });
            $transactions = $breakdownList->transactions->whereIn('transaction_type', ['payment']);
            $breakdownList->list_balance -= $transactions->sum('transaction_amount');
            return $breakdownList;
        });
 

        return view('pages.payment.payment')->with([
            'clientApplication' => $clientApplication,
            'breakdownLists' => $breakdownLists,
        ]);
    }

    public function client_application_deposit(Request $request)
    {
        $user = auth()->user();
        $clientApplication = ClientApplication::find($request->clientApplication);
        if($clientApplication->payment_status == 'payment')
        {
            return redirect()->route('client_application_payment', [$clientApplication])->with('error', "You entered the deposit page but there are no deposits payable, You are now on the payments page. Please see your outstanding balances.");
        }
        $breakdownLists = BreakdownList::where('parent_ref_id', $request->clientApplication)
        ->where('list_deposit', '>', 0)->get();

        $breakdownLists = $breakdownLists->filter(function($breakdownList)
        {
            $breakdownItems = $breakdownList->breakdownItems->filter(function($breakdownItem)
            {
                $transactions = $breakdownItem->transactions->filter(function($transaction)
                {
                    return $transaction->transaction_type == 'deposit';
                });
                return $breakdownItem->item_deposit > 0 && $breakdownItem->item_deposit > $transactions->sum('transaction_amount');
            });
            $breakdownList->breakdownItems = $breakdownItems;
            return $breakdownList->breakdownItems->count() > 0;
        });

        $breakdownLists->transform(function($breakdownList)
        {            
            $breakdownList->breakdownItems->transform(function($breakdownItem)
            {
                $transactions = $breakdownItem->transactions->where('transaction_type', 'deposit');
                $breakdownItem->item_deposit -= $transactions->sum('transaction_amount');
                return $breakdownItem;
            });
            $transactions = $breakdownList->transactions->where('transaction_type', 'deposit');
            $breakdownList->list_deposit -= $transactions->sum('transaction_amount');
            return $breakdownList;
        });
 
        return view('pages.payment.deposit')->with([
            'breakdownLists' => $breakdownLists,
        ]);
    }

    public function client_application_services()
    {
        $user = auth()->user();
        $clientApplication = ClientApplication::find($request->input('ref_id'));
        return view('pages.payment.services_payment')->with('clientApplication', $clientApplication);
    }

    public function admin($user = null)
    {
        if(Gate::forUser(auth()->user())->allows('show-admin'))
        {
            $user = User::find($user);
            
            return view('pages.admin')->with([
                'user' => $user,
                ]);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', 'You are not permitted to access this resource. This attempt has been logged.');
        }
    }
    
}
