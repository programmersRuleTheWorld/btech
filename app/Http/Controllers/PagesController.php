<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Post;
use App\User;
use App\AffiliateCampaign;
use App\ClientApplication;
use Feeds;
use App\Role;
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
            
            return view('pages/index')->with(
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
        return view('pages/about');
    }
    
    public function contact()
    {
        return view('pages/contact');
    }
    
    public function blog()
    {
        $posts = Post::all();
        return view('posts/index')->with(['posts' => $posts]);
    }

    public function services()
    {
        return view('pages/services');
    }

    public function privacy()
    {
        $privacyPolicy = DB::table('agreements')->value('privacy_policy');
        return view('pages/privacy_policy')->with('privacyPolicy', $privacyPolicy);
    }

    public function service_agreement()
    {
        $serviceAgreement = DB::table('service_agreement')->value('data');
        return view('pages/service_agreement')->with('service_agreement', $serviceAgreement
    );
    }

    public function affiliate_details()
    {
        $user = auth()->user();
        $affiliate_campaigns = AffiliateCampaign::where('affiliate_id', $user->affiliate_id)->get();

        return view('pages.affiliate_details')->with([
            'affiliate_campaigns' => $affiliate_campaigns,
        ]);
    }

    public function admin()
    {
        $user = auth()->user();
        if(Gate::forUser($user)->allows('show-admin'))
        {
        $count = 1;
        $users = User::paginate('10', ['*'], 'users');
        $clientApplications = ClientApplication::all();
        $roles = Role::all();

        return view('pages/admin')->with([
            'users' => $users,
            'clientApplications' => $clientApplications,  
            'count' => $count,
            'roles' => $roles,          
        ]);
        }
        else
        {
            return redirect()->route('dashboard')->with('error', 'You are not permitted to access this resource. This attempt has been logged.');
        }
    }
    
}
