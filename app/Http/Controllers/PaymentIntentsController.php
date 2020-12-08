<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentIntentsController extends Controller
{
  public function generate(Request $request)
  {
    // This is your real test secret API key.
    
    \Stripe\Stripe::setApiKey('sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX');
    
    header('Content-Type: application/json');
    
      if($request->session()->has('clientId'))
      {
        $stripe = new \Stripe\StripeClient(
          'sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX'
        );
        $stripe->paymentIntents->update(
          session('clientId'),
          [
            'amount' => 99,

            'currency' => 'usd',
          ]
        );
      }
      else
      {

// function calculateOrderAmount(array $items): int {

  // Replace this constant with a calculation of the order's amount

  // Calculate the order total on the server to prevent

  // customers from directly manipulating the amount on the client

//  return 1400;

// }


try {

  $paymentIntent = \Stripe\PaymentIntent::create([

    'amount' => 70,

    'currency' => 'usd',

  ]);

  session(['clientId' => $paymentIntent->id]);

  $output = [

    'clientSecret' => $paymentIntent->client_secret,
    'clientId' => $paymentIntent->id,

  ];

  echo json_encode($output);

} catch (Error $e) {

  http_response_code(500);

  echo json_encode(['error' => $e->getMessage()]);

}
}
}
}
