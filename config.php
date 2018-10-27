<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_RlBQ5xSVC1gBAoJNHskC0OWn",
  "publishable_key" => "pk_test_fHzJVW9xkeyLI2ViQhsvxMUX"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>