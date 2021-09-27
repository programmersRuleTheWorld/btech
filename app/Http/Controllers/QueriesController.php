<?php

namespace App\Http\Controllers;

use App\ClientApplication;
use App\User;
use Illuminate\Http\Request;

class QueriesController extends Controller
{
    public function adminSearch(Request $request)
    {
        $searchString = $request->input('searchString');
        $searchType = $request->input('searchType');

        switch($searchType)
        {
            case 0: $users = User::where(['last_name' => $searchString])->get();
            if($users->count() > 0)
            {
                return view('pages.admin')->with('users', $users);
            }
            else
            {
                return redirect()->route('admin')->with('error', "This user does not exist.");
            }
            break;
            case 1: $users = User::where(['email' => $searchString])->get();
            if($users->count() > 0)
            {
                return view('pages.admin')->with('users', $users);
            }
            else
            {
                return redirect()->route('admin')->with('error', "This user does not exist.");
            }
            break;
            case 2: $clientApplications = ClientApplication::where(['last_name' => $searchString])->get();
            if($clientApplications->count() > 0)
            {
                return view('pages.admin')->with('clientApplications', $clientApplications);
            }
            else
            {
                return redirect()->route('admin')->with('error', "These client applications do not exist.");
            }
            break;
            case 3: $clientApplication = ClientApplication::where(['ref_id' => $searchString])->first();
            if($clientApplication)
            {
                return redirect()->route('clientapplications.show', [$clientApplication])->with('clientApplication', $clientApplication);
            }
            else
            {
                return redirect()->route('admin')->with('error', "This client application does not exist.");
            }
            break;
            case 4: $clientApplications = ClientApplication::where(['email' => $searchString])->get();
            if($clientApplications->count() > 0)
            {
                return view('pages.admin')->with('clientApplications', $clientApplications);
            }
            else
            {
                return redirect()->route('admin')->with('error', "These client applications do not exist.");
            }
            break;
            case 5: $clientApplications = ClientApplication::where(['project_status' => $searchString])->get();
            if($clientApplications->count() > 0)
            {
                return view('pages.admin')->with('clientApplications', $clientApplications);
            }
            else
            {
                return redirect()->route('admin')->with('error', "These client applications do not exist.");
            }
            break;
            
        }
    }
}