<?php

namespace App\Http\Controllers;

use App\ClientApplicationComment;
use App\ClientApplication;
use App\Events\ClientApplicationComments\ClientApplicationCommentCreated;
use Illuminate\Http\Request;

class ClientApplicationCommentsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ClientApplicationComment::class, 'App\ClientApplicationComment');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $validatedData = $this->validate($request, 
        [
            'comment_body' => 'required',
            'comment_title' => 'required',
            'comment_status' => 'required'
        ]);

        $user = auth()->user();
        $clientApplicationComment = new ClientApplicationComment();
        $clientApplicationComment->parent_ref_id = $request->input('ref_id');
        $clientApplicationComment->user_id = $user->id;
        $clientApplicationComment->comment_title = $request->input('comment_title');
        $clientApplicationComment->comment_body = $request->input('comment_body');
        $clientApplicationComment->comment_status = $request->input('comment_status');
        $clientApplicationComment->clientApplication->updated_at = ClientApplication::where(['ref_id' => $clientApplicationComment->parent_ref_id])->update(['updated_at' => now()]);
        $clientApplicationComment->save();
        
        $clientApplication = ClientApplication::find($request->input('ref_id'));

        return redirect()->route('clientapplications.show', [$clientApplication])->with('success', "Comment added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return \Illuminate\Http\Response
     */
    public function show(ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientApplicationComment $clientApplicationComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientApplicationComment  $clientApplicationComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientApplicationComment)
    {
        $clientApplicationComment = ClientApplicationComment::find($clientApplicationComment);
        $clientApplicationComment->delete();

        return redirect()->back()->with('success',"Comment deleted!");
    }
}
