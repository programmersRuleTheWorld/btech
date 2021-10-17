<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BreakdownList;
use App\Payment;

class PaymentsController extends Controller
{
    public function paymentIntent(Request $request)
    {
      // This is your real test secret API key.
      \Stripe\Stripe::setApiKey('sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX');

      
      \Log::debug($request->input('payableArray'));
      if($request->input('payableArray') != null)
      {
        $keys = array($request->input('payableArray'));
          
        for($i = 0; $i < sizeOf($keys); $i++)
          {
            $breakdownLists = collect(BreakdownList::find($keys[$i]));
          }
          
          if($request->input('pathname') == '/payment')
          {
            $breakdownLists->transform(function($breakdownList)
            {
                $transactions = $breakdownList->transactions->whereIn('transaction_type', ['payment']);
                $breakdownList->list_deposit -= $transactions->sum('transaction_amount');
                return $breakdownList;
            });

            $paymentDue = $breakdownLists->sum('list_balance') * 100;
          }
          elseif($request->input('pathname') == '/deposit')
          {
            $breakdownLists->transform(function($breakdownList)
            {
                $transactions = $breakdownList->transactions->whereIn('transaction_type', ['deposit']);
                $breakdownList->list_deposit -= $transactions->sum('transaction_amount');
                return $breakdownList;
            });

            $paymentDue = $breakdownLists->sum('list_deposit') * 100;
          }
          
          $breakdownList = $breakdownLists->first();
          $payableArrayJsonified = json_encode(['keys' => $request->input('payableArray')]);
          
          $metadata = [
            'paymentDue' => $paymentDue,
            'paymentType' => $breakdownList->clientApplication->payment_status,
            'breakdownLists' => $payableArrayJsonified,
          ];          
        }
        elseif($request->input('payableArray') == null)
        {        
          // dummy data
          $paymentDue = 100;
          $metadata = [
            'paymentDue' => $paymentDue,
            'paymentType' => 'dummy placeholder',
            'breakdownLists' => null,
          ];
        }
        header('Content-Type: application/json');

        switch(session('paymentIntentId'))
        {
          // if no previous paymentintent stored in session
          case null : 
            {
              try {

                // retrieve JSON from POST body
              
                $json_str = file_get_contents('php://input');
              
                $json_obj = json_decode($json_str);
              
                $paymentIntent = \Stripe\PaymentIntent::create([
              
                  'amount' => $paymentDue,

                  'metadata' => $metadata,
              
                  'currency' => 'usd',
              
                ]);
              
                $output = [
              
                  'clientSecret' => $paymentIntent->client_secret,
                  'amount' => $paymentDue,
              
                ];
              
                session(['paymentIntentId' => $paymentIntent->id]);
                echo json_encode($output);
              
              } catch (Error $e) {
              
                http_response_code(500);
                
                echo json_encode(['error' => $e->getMessage()]);
              }
            }
          break;
          // if previous paymentintent stored in session
          case !null :
            {
              try {

                // retrieve JSON from POST body
              
                $json_str = file_get_contents('php://input');
              
                $json_obj = json_decode($json_str);
              
                $stripe = new \Stripe\StripeClient(
                  'sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX'
                );

                $oldPaymentIntent = $stripe->paymentIntents->retrieve(session('paymentIntentId'),[]);

                if($oldPaymentIntent['status'] != 'succeeded')
                {
                  $oldPaymentIntent->update(session('paymentIntentId'),
                  [
                    'amount' => $paymentDue,
  
                    'metadata' => $metadata,
                
                    'currency' => 'usd',
                  ]);
                  
                  $output = [
                    
                    'clientSecret' => $oldPaymentIntent->client_secret,
                    'amount' => $paymentDue,
                  ];
                  echo json_encode($output);
                }
                elseif($oldPaymentIntent['status'] == 'succeeded')
                {

                  try {

                    // retrieve JSON from POST body
                  
                    $json_str = file_get_contents('php://input');
                  
                    $json_obj = json_decode($json_str);
                  
                    $paymentIntent = \Stripe\PaymentIntent::create([
                  
                      'amount' => $paymentDue,
    
                      'metadata' => $metadata,
                  
                      'currency' => 'usd',
                  
                    ]);
                  
                    $output = [
                  
                      'clientSecret' => $paymentIntent->client_secret,
                      'amount' => $paymentDue,
                    ];
                  
                    session(['paymentIntentId' => $paymentIntent->id]);
                    echo json_encode($output);
                  
                  } catch (Error $e) {
                  
                    http_response_code(500);
                    
                    echo json_encode(['error' => $e->getMessage()]);
                  }
    

                }
                  
              
              } catch (Error $e) {
              
                http_response_code(500);
                
                echo json_encode(['error' => $e->getMessage()]);
              }
            }
          break;
        }
     }
  }

