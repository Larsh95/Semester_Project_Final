<?php
require_once('stripe-php-7/init.php');

$stripe = array(
  "secret_key"      => "sk_test_51K44rOF6f6KRhVPFxhzlDPSDm8Dj5KxJOM6ikkrh6LvobGwd7pIif00UkUFSsj6FShRNASlK2MtnJsCZUCtvE44F00OV2iVzU2",
  "publishable_key" => "pk_test_51K44rOF6f6KRhVPFvhrgGIh9BCQJepuT6jH2xhRrLDwl9bZo8x6NCLkDicmAoGb0MkhRkJMn5UAQ5FHfZDhnDL3z00UERyVfP3"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
