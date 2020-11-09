<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Events\Bugs\BugClosed;
use App\Events\Bugs\BugOpened;
use Illuminate\Http\Request;

class BugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'branch' => 'required|max:50',
            'description' => 'required|max:500',
            'severity' => 'required|max:50',
        ]);

        $bug = new Bug();
        
        $bug->repo_id = $request->input('repo_id');
        $bug->branch = $request->input('branch');
        $bug->description = $request->input('description');
        $bug->severity = $request->input('severity');
        $bug->save();

        event(new BugOpened($bug));

        return redirect()->route('development_center')->with('success', "Bug successfully added to tracker.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function show(Bug $bug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function edit(Bug $bug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bug $bug)
    {
        //
    }

    public function isComplete($bug)
    {
        $bug = Bug::find($bug);
        if($bug->status == true)
        {
            $bug->status = false;
            event(new BugClosed($bug));
            $bug->save();
            return redirect()->route('development_center')->with('success', "Bug successfully closed.");
        }
        elseif($bug->status == false)
        {
            $bug->status = true;
            event(new BugOpened($bug));
            $bug->save();
            return redirect()->route('development_center')->with('success', "Bug successfully reopened.");
        }
        else
        {
            $bug->save();
            
            return redirect()->route('development_center')->with('error', "Bug does not exist.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bug  $bug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bug $bug)
    {
        //
    }
}
