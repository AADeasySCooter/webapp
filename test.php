<?php

require_once('vendor/autoload.php');
$stripe = new \Stripe\StripeClient('sk_test_VePHdqKTYQjKNInc7u56JBrQ');

$stripe->paymentIntents->create(
  ['amount' => 500, 'currency' => 'gbp', 'payment_method' => 'pm_card_visa']
);

?>

<html>
  <head>
    <title>Buy cool new product</title>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <button id="checkout-button">Checkout</button>
    <script>
      var stripe = Stripe('sk_test_51IyMVtKmuBgODqX3GqC72u520wpv1mLnSJANu9kRw4zFsdkt54Tn2DuRJXsz6nyiQ6BTvK7KIKxWtMAyXVbNcsEl001NwRJ3pg');
      const btn = document.getElementById("checkout-button")
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        stripe.redirectToCheckout({
          sessionId: "<?php echo $session->id; ?>"
        });
      });
    </script>
  </body>
</html>