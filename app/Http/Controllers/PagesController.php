<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        $posts = Post::latest()->take(1)->with('user')->get();
        return view('pages/index')->with('posts', $posts);
    }
    
    public function about(){
        return view('pages/about');
    }
    
    public function contact(){
        return view('pages/contact');
    }
    
    public function blog(){
        $posts = Post::all();
        return view('posts/index')->with('posts', $posts);
    }

    public function privacy(){
        return view('pages/privacy');
    }

    public function admin(){
        return view('pages/admin');
    }
    
}
