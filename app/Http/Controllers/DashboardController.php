<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ClientApplication;
use ClientApplicationsController;

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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with(
            [
            'posts' => $user->posts,
            'affiliate_id' => $user->affiliate_id,
            'projects' => $user->clientapplication,
            'user' => $user->name
            ]
        );
    }
}
