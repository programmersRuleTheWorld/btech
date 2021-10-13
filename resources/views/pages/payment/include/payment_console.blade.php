<input type="hidden" value="{{ csrf_token() }}" id="csrf">

<div class="col-md-6 mr-auto">
    <div class="card bg-info">
        <div class="card-header text-center">
            Payment Details
        </div>
        <div class="card-body">
    <!-- Display a payment form -->

    <form id="payment-form">

      <div id="card-element"><!--Stripe.js injects the Card Element--></div>

      <button id="submit">

        <div class="spinner hidden" id="spinner"></div>

        <span id="button-text">Pay now</span>

      </button>

      <p id="card-error" role="alert"></p>

      <p class="result-message hidden">

        Payment succeeded, see the result in your

        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.

      </p>

    </form>
        </div>
    </div>
</div>