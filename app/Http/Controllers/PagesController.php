<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\AffiliateCampaign;
use Feeds;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('verified', ['except' => ['index', 'services', 'about', 'contact', 'privacy', 'service_agreement', 'blog', 'affiliate']]);
    }
    
    public function index(){
        $title = "Home";
        $user = auth()->user();
        $posts = Post::latest()->take(3)->with('user')->get();
        
        $feed = Feeds::make(
            
                'http://www.techrepublic.com/rssfeeds/topic/security/?feedType=rssfeeds'
            
            );
        $feed->set_image_handler('handler_image.php','image');
        $feed->set_cache_location('mysql://root:root@localhost:3306/btech?prefix=sp_');
        $feed->init();      

            $title = $feed->get_title();
            $permalink = $feed->get_permalink();
            $image = $feed->get_image_url();
            $items = $feed->get_items(0,6);

            return view('pages/index')->with(
            [
                'posts' => $posts,
                'user' => $user,
                'feed' => $feed,
                'title' => $title,
                'permalink' => $permalink,
                'image' => $image,
                'items' => $items,
                'title' => $title,
                ]
            );
    }
    
    public function about()
    {
        $title = "About";
        return view('pages/about')->with('title', $title);
    }
    
    public function contact()
    {
        $title = "Contact";
        return view('pages/contact')->with('title', $title);
    }
    
    public function blog()
    {
        $title = "Blog";
        $posts = Post::all();
        return view('posts/index')->with(['posts' => $posts, 'title' => $title]);
    }

    public function services()
    {
        $title = "Services";
        return view('pages/services')->with('title', $title);
    }

    public function privacy()
    {
        $title = "Privacy Policy";
        return view('pages/privacy_policy')->with('title', $title);
    }

    public function service_agreement()
    {
        $title = "Service Agreement";
        return view('pages/service_agreement')->with('title', $title);
    }

    public function affiliate_details()
    {
        $title = "My Affiliate Details";
        $user = auth()->user();
        $affiliate_campaigns = AffiliateCampaign::where('affiliate_id', $user->affiliate_id)->get();

        return view('pages.affiliate_details')->with([
            'affiliate_campaigns' => $affiliate_campaigns,
            'title' => $title,
        ]);
    }

    public function admin()
    {
        return view('pages/admin');
    }
    
}
