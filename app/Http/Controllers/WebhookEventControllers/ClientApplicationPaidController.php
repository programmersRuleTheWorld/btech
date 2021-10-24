<?php

namespace App\Http\Controllers\WebhookEventControllers;

use App\ClientApplication;
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
      
      $endpoint_secret = 'whsec_kpB3fzBrhV0TPYxMdOhry7FUlVUNVbmT';
      
      $payload = @file_get_contents('php://input');
      
      $event = null;
      
      try {
      
        $event = \Stripe\Event::constructFrom(
      
          json_decode($payload, true)
      
        );
      
      } catch(\UnexpectedValueException $e) {
      
        // Invalid payload
      
        echo '⚠️  Webhook error while parsing basic request.';
      
        http_response_code(400);
      
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
      
          http_response_code(400);
      
          exit();
      
        }
      
      }
      
      // Handle the event
      
      switch ($event->type) {
      
        case 'payment_intent.succeeded':
      
          $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
          $clientApplication = ClientApplication::find($paymentIntent['metadata']['refId']);
          \Mail::to($clientApplication->email)->send(new \App\Mail\ClientApplications\Paid($paymentIntent['metadata']));

          session()->forget('paymentIntentId');
          
          // Then define and call a method to handle the successful payment intent.
          if($paymentIntent['metadata']['paymentType'] == "payment")
          {
            event(new ClientApplicationPaymentPaid($paymentIntent['metadata']['breakdownLists']));
          }
          elseif($paymentIntent['metadata']['paymentType'] == "deposit")
          {
            event(new ClientApplicationDepositPaid($paymentIntent['metadata']['breakdownLists']));
          }      
      
              // if project's owner was referred by another user, add commission to corresponding affiliate campaign on payment confirmation

              if($clientApplication->user->referred_by != null)
              {
                $affiliateCampaign = $clientApplication->user->affiliateCampaign;
                $affiliateCampaign->campaign_balance = ($affiliateCampaign->commission_rate * ($paymentIntent['metadata']['paymentDue'] / 100));
                $affiliateCampaign->affiliateUser->user_earnings += $affiliateCampaign->campaign_balance;
                $affiliateCampaign->affiliateUser->save();
                $affiliateCampaign->save();
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