<?php

namespace App\Http\Controllers;

use App\ClientApplicationComment;
use App\ClientApplication;
use App\Mail\CommentAdded;
use Mail;
use Illuminate\Http\Request;

class ClientApplicationCommentsController extends Controller
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
    public function store(Request $request, ClientApplication $clientapplication)
    {
        $validatedData = $this->validate($request, 
        [
            'comment' => 'required',
            'status' => 'required'
        ]);

        $user = auth()->user();
        $comment = new ClientApplicationComment();
        $comment->parent_ref_id = $request->input('ref_id');
        $comment->user_id = $user->id;
        $comment->title = $request->input('title');
        $comment->comment = $request->input('comment');
        $comment->status = $request->input('status');
        $comment->clientapplication->updated_at = ClientApplication::where(['ref_id' => $comment->parent_ref_id])->update(['updated_at' => now()]);
        $comment->save();

        Mail::to($comment->clientapplication->email)
        ->send(new CommentAdded($comment));

        return redirect()->back()->with('success', "Comment has been successfully attached to client application $comment->parent_ref_id.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientApplicationComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(ClientApplicationComment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientApplicationComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientApplicationComment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientApplicationComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientApplicationComment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientApplicationComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $comment = ClientApplicationComment::find($comment);
        $commentUpdate = ClientApplication::where(['ref_id' => $comment->parent_ref_id])->update(['updated_at' => now()]);
        $comment->delete();

        return redirect()->back()->with('success',"Comment has been successfully deleted from $comment->parent_ref_id.");
    }
}
