<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\AffiliateCampaign;
use App\ClientApplication;
use Feeds;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('verified', ['except' => ['index', 'services', 'about', 'contact', 'privacy', 'service_agreement', 'blog', 'affiliate']]);
    }
    
    public function index(){
        $user = auth()->user();
        $posts = Post::latest()->take(3)->with('user')->get();
        
        $feed = Feeds::make(
            
                'http://www.csoonline.com/index.rss'
            
            );
        $feed->set_image_handler('handler_image.php','image');
        $feed->set_cache_location('mysql://root:root@localhost:3306/btech?prefix=sp_');
        $feed->init();      

            $items = $feed->get_items(0,5);

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
        return view('pages/privacy_policy');
    }

    public function service_agreement()
    {
        return view('pages/service_agreement');
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
        $count = 1;
        $users = User::paginate('10', ['*'], 'users');
        $clientapplications = ClientApplication::all();
//        $issues = Issue::all();

        return view('pages/admin')->with([
            'users' => $users,
            'clientapplications' => $clientapplications,  
            'count' => $count,          
        ]);
    }
    
}
