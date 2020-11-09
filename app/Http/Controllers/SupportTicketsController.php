<?php

namespace App\Http\Controllers;

use App\SupportTicket;
use App\ClientApplication;
use App\Events\SupportTickets\SupportTicketOpened;
use App\Events\SupportTickets\SupportTicketClosed;
use Illuminate\Http\Request;

class SupportTicketsController extends Controller
{

    public function __construct()
    {
        //$this->authorizeResource(SupportTicket::class, 'App\SupportTicket');
    }

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
        $this->authorize('create', SupportTicket::class);
        $supportTicket = new SupportTicket();
        $this->validate($request,[
            'title' => 'required|max:200',
            'comment' => 'required|max:2000',
        ]);
        $supportTicket->operation_id = $request->input('operation_id');
        $supportTicket->title = $request->input('title');
        $supportTicket->comment = $request->input('comment');

        $supportTicket->save();
        event(new SupportTicketOpened($supportTicket));


        return redirect()->back()->with('success', "Your inquiry has been saved and you will receive a response soon.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function show(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTicket $supportTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportTicket $supportTicket)
    {
        //
    }

    public function isComplete($supportTicket)
    {
        $supportTicket = SupportTicket::find($supportTicket);
        if($supportTicket->status == 'open')
        {
            $supportTicket->status = 'closed';
            $supportTicket->save();

            event(new SupportTicketClosed($supportTicket));
        }
        elseif($supportTicket->status == 'closed')
        {
            $supportTicket->status = 'open';
            $supportTicket->save();

            event(new SupportTicketOpened($supportTicket));
        }

        return redirect()->back()->with('success', "The status of the support ticket has been changed to $supportTicket->status.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy($supportTicket)
    {
        $supportTicket = SupportTicket::find($supportTicket);
        $supportTicket->delete();
        
        return redirect()->back()->with('success', "Support ticket message deleted!");
    }
}
