<?php

namespace App\Http\Controllers;

use App\Repo;
use App\ClientApplication;
use App\Events\Repos\RepoCreated;
use App\Events\Repos\RepoUpdated;
use Illuminate\Http\Request;

class ReposController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Repo::class, 'App\Repo');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repos = Repo::where(['parent_ref_id' => $request->input('ref_id')])->get();

        if($repos->count() <= 0)
        {
            return back()->with('error', "No repositories currently available for this Client Application.");
        }
        else
        {
        return view('repos.show')->with('repos', $repos);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientApplication = ClientApplication::find($request->input('ref_id'));
        $repo = new Repo();
        $repo->parent_ref_id = $clientApplication->ref_id;
        $repo->save();

        return redirect()->back()->with('success', "A new repo instance has been created for Client Application $clientApplication->ref_id.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function edit(Repo $repo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repo $repo)
    {
        $repo->repo_type = $request->input('repo_type');
        $repo->repo_url = $request->input('repo_url');
        $repo->latest_commit = $request->input('latest_commit');
        $repo->save();
        
        return redirect()->route('development_center')->with('success', "Repo type \"$repo->repo_type\" for Client Application $repo->parent_ref_id has been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repo  $repo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repo $repo)
    {
        //
    }
}
