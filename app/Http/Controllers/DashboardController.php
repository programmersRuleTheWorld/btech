<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClientApplication;
use App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $jobs = ClientApplication::paginate(10);
        $user->clientapplication = ClientApplication::paginate(5);
        $user->post = Post::paginate(5);
        return view('dashboard')->with(
            [
            'posts' => $user->post,
            'affiliate_id' => $user->affiliate_id,
            'clientapplications' => $user->clientapplication,
            'jobs' => $jobs,
            'user' => $user
            ]
        );
    }
}
