
<?php
session_start();
  require_once('./config.php');

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];

  $customer = \Stripe\Customer::create(array(
      'email' => $email,
      'source'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $_SESSION['amount']*100,
      'currency' => 'usd'
  ));
  
  unset($_SESSION['cart_count']);
unset($_SESSION['cart_item']);
  header('location: payment_success.php');
  
  // echo "<h1>Successfully charged $50.00!</h1>";
?>