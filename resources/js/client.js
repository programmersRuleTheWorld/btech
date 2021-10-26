
if(window.location.pathname == '/payment' || window.location.pathname == '/deposit')
{
// A reference to Stripe.js initialized with your real test publishable API key.
var stripe = Stripe("pk_test_PizxswoWx6ETSdrqta2omBy400RkXKyv20");
var csrf = document.getElementById('csrf').value;

// Disable the button until we have Stripe set up on the page
document.querySelector("button").disabled = true;

const data = {
  'payableArray': window.payableArray, 
  'pathname': window.location.pathname}
  fetch("/paymentintent", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      'X-CSRF-TOKEN': csrf,
    },
    body: JSON.stringify(data),
  })
  .then(function(result) {
    return result.json();
  })
  .then(function(data) {
    var elements = stripe.elements();
    var style = {
      base: {
        color: "blue",
        fontFamily: 'Arial, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "blue"
        }
      },
      invalid: {
        fontFamily: 'Arial, sans-serif',
        color: "red",
        iconColor: "red"
      }
    };

    var card = elements.create("card", { style: style });
    // Stripe injects an iframe into the DOM
    card.mount("#card-element");

    card.on("change", function (event) {
      // Disable the Pay button if there are no card details in the Element
      document.querySelector("button").disabled = event.empty;
      document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
    });

    
    var form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      // Complete payment when the submit button is clicked
      if(amount > 0)
      {
        payWithCard(stripe, card, data.clientSecret);
      }
      else
      {
        alert('You must select at least one payable Breakdown List before submitting your payment information.');
      }
    });
  });
  
  // Calls stripe.confirmCardPayment
  // If the card requires authentication Stripe shows a pop-up modal to
  // prompt the user to enter authentication details without leaving your page.
  var payWithCard = function(stripe, card, clientSecret) {
    loading(true);
  stripe
  .confirmCardPayment(clientSecret, {
    payment_method: {
      card: card
    }
  })
    .then(function(result) {
      if (result.error) {
        // Show error to your customer
        showError(result.error.message);
      } else {
        // The payment succeeded!
        orderComplete(result.paymentIntent.id);
      }
    });
  };
  
  /* ------- UI helpers ------- */
  
  // Shows a success message when the payment is complete
  
  var submit = document.getElementById('submit');
  submit.className = 'btn btn-dark text-info';
var orderComplete = function(paymentIntentId) {
  loading(false);
  document
    .querySelector(".result-message a")

  document.querySelector(".result-message").classList.remove("hidden");
  document.querySelector("button").disabled = true;
};

// Show the customer the error from Stripe if their card fails to charge
var showError = function(errorMsgText) {
  loading(false);
  var errorMsg = document.querySelector("#card-error");
  errorMsg.textContent = errorMsgText;
  setTimeout(function() {
    errorMsg.textContent = "";
  }, 4000);
};

// Show a spinner on payment submission
var loading = function(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("button").disabled = true;
    document.querySelector("button").classList.add("disabled");
  } else {
    document.querySelector("button").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("button").classList.remove("disabled");
  }
};
}