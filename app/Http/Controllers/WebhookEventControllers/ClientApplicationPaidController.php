<?php

namespace App\Http\Controllers\WebhookEventControllers;

use App\Events\ClientApplications\ClientApplicationPaymentPaid;
use App\Events\ClientApplications\ClientApplicationDepositPaid;
use App\Events\ClientApplications\ClientApplicationCompleted;

class ClientApplicationPaidController
{
    public function paymentintent_succeeded()
    {

\Stripe\Stripe::setApiKey('sk_test_uGWrYmvc6dffLA1mwZBIA3V200P6ARmUpX');

// Replace this endpoint secret with your endpoint's unique secret

// If you are testing with the CLI, find the secret by running 'stripe listen'

// If you are using an endpoint defined with the API or dashboard, look in your webhook settings

// at https://dashboard.stripe.com/webhooks

$endpoint_secret = 'whsec_mJpGh7LEN1OMLhfuM1pqNnSRB1m0O9ow';

$payload = @file_get_contents('php://input');

$event = null;

try {

  $event = \Stripe\Event::constructFrom(

    json_decode($payload, true)

  );

} catch(\UnexpectedValueException $e) {

  // Invalid payload

  echo '⚠️  Webhook error while parsing basic request.';

  http_response_code(200);

  exit();

}

if ($endpoint_secret) {

  // Only verify the event if there is an endpoint secret defined

  // Otherwise use the basic decoded event

  $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

  try {

    $event = \Stripe\Webhook::constructEvent(

      $payload, $sig_header, $endpoint_secret

    );

  } catch(\Stripe\Exception\SignatureVerificationException $e) {

    // Invalid signature

    echo '⚠️  Webhook error while validating signature.';

    http_response_code(200);

    exit();

  }

}

// Handle the event

switch ($event->type) {

  case 'payment_intent.succeeded':
    
    $clientApplication = $event->data->object; // contains a \Stripe\PaymentIntent
    // Then define and call a method to handle the successful payment intent.
    if($clientApplication['metadata'][1] == "payment")
    {
      event(new ClientApplicationPaymentPaid($clientApplication['metadata'][0]));
      event(new ClientApplicationCompleted($clientApplication['metadata'][0]));
    }
    elseif($clientApplication['metadata'][1] == "deposit")
    {
      event(new ClientApplicationDepositPaid($clientApplication['metadata'][0]));
    }

    break;

  case 'payment_method.attached':

    $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod

    // Then define and call a method to handle the successful attachment of a PaymentMethod.

    // handlePaymentMethodAttached($paymentMethod);

    break;

  default:

    // Unexpected event type

    echo 'Received unknown event type';

}
http_response_code(200);

        
    }
}