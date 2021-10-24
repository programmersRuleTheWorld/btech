<?php

namespace App\Http\Controllers;

use App\SupportTicketComment;
use Illuminate\Http\Request;

class SupportTicketCommentsController extends Controller
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
            'comment' => 'required|max:1000',
        ]);
        $user = auth()->user();

        $this->authorize('create', $supportTicketComment);

        $supportTicketComment = new SupportTicketComment();
        $supportTicketComment->support_ticket_id = $request->input('support_ticket_id');
        if($user->isAdmin() == true)
        {
            $supportTicketComment->respondent_type = 'Support';
        }
        else
        {
            $supportTicketComment->respondent_type = 'Client';

        }
        $supportTicketComment->comment = $request->input('comment');
        $supportTicketComment->save();

        return redirect()->back()->with('success', "Comment has been successfully added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return \Illuminate\Http\Response
     */
    public function show(SupportTicketComment $supportTicketComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTicketComment $supportTicketComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportTicketComment $supportTicketComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportTicketComment  $supportTicketComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($supportTicketComment)
    {
        $supportTicketComment = SupportTicketComment::find($supportTicketComment);
        $this->authorize('delete', $supportTicketComment);
        $supportTicketComment->delete();
        
        return redirect()->back()->with('success', "Support ticket message deleted!");
    }
}
