<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BreakdownList;

class PaymentsController extends Controller
{
    public function paymentIntent(Request $request)
    {
        // This is your real test secret API key.

\Stripe\Stripe::setApiKey('sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX');

    $keys = array($request->input('payableArray'));
    for($i = 0; $i < sizeOf($keys); $i++)
    {
        $breakdownLists = collect(BreakdownList::find($keys[$i]));
    }

    if($request->input('pathname') == '/payment')
    {
      $paymentDue = $breakdownLists->sum('list_balance');
    }
    elseif($request->input('pathname') == '/deposit')
    {
      $paymentDue = $breakdownLists->sum('list_deposit');
    }
  
  $breakdownList = $breakdownLists->first();
  $payableArrayJsonified = json_encode(['keys' => $request->input('payableArray')]);

  header('Content-Type: application/json');

  try {

    // retrieve JSON from POST body

    $json_str = file_get_contents('php://input');

    $json_obj = json_decode($json_str);

    $paymentIntent = \Stripe\PaymentIntent::create([

      'amount' => $paymentDue * 100,

      'currency' => 'usd',

      'metadata' => [
                      'paymentDue' => $paymentDue,
                      'paymentType' => $breakdownList->clientApplication->payment_status,
                      'breakdownLists' => $payableArrayJsonified,
                    ],
    ]);

    $output = [

      'clientSecret' => $paymentIntent->client_secret,
      'metadata' => $paymentIntent->metadata,

    ];

    echo json_encode($output);


  } catch (Error $e) {

    http_response_code(500);

    echo json_encode(['error' => $e->getMessage()]);

  }
  }
}
