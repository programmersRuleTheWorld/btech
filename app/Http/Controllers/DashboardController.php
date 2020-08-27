<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClientApplication;
use App\Post;
use App\AffiliateCampaign;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
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
        $clients = User::where('referred_by', $user->affiliate_id)->get();
        $jobs = ClientApplication::paginate(5, ['*'], 'jobs');
        $user->clientApplications = ClientApplication::where(['user_id' => $user->id])->paginate(5, ['*'], 'clientApplications');
        $user->post = Post::where(['user_id' => $user->id])->paginate(5, ['*'], 'posts');
        return view('dashboard/show')->with(
            [
            'posts' => $user->post,
            'clientApplications' => $user->clientApplications,
            'jobs' => $jobs,
            'clients' => $clients,
            'user' => $user,
            ]
        );
    }
}
