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

        Payment successful! <a class="btn btn-dark text-info" href="{{ route('dashboard') }}">Return to My User Dashboard</a>.

      </p>

    </form>
        </div>
    </div>
</div>