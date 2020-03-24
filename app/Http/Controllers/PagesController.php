<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Feeds;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('verified', ['except' => ['index', 'services', 'about', 'contact', 'privacy', 'service_agreement', 'blog', 'affiliate']]);
    }
    
    public function index(){
        $posts = Post::latest()->take(1)->with('user')->get();
        
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
                'feed' => $feed,
                'title' => $title,
                'permalink' => $permalink,
                'image' => $image,
                'items' => $items
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
        return view('posts/index')->with('posts', $posts);
    }

    public function services()
    {
        return view('pages/services');
    }

    public function privacy()
    {
        return view('pages/privacy');
    }

    public function service_agreement()
    {
        return view('pages/service_agreement');
    }

    public function affiliate()
    {
        return view('pages/affiliate');
    }

    public function admin()
    {
        return view('pages/admin');
    }
    
}
