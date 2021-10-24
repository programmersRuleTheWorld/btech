<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\BreakdownItem;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->authorize(Transaction::class, 'App\Transaction');
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
    public function store(BreakdownItem $breakdownItem)
    {
        $transaction = new Transaction();
        $transaction->parent_ref_id = $breakdownItem->parent_ref_id;
        $transaction->transaction_description = $breakdownItem->item_description;
        $transaction->transaction_type = $breakdownItem->payment_type;
        if($transaction->transaction_type == 'deposit')
        {
            $transaction->transaction_amount = $breakdownItem->item_deposit;
        }
        elseif($transaction->transaction_type == 'payment')
        {
            $transaction->transaction_amount = $breakdownItem->item_balance - $breakdownItem->transactions->sum('transaction_amount');
        }
        $transaction->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
