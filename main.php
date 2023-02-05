<?php

require 'vendor/autoload.php';

use TelePay\TelePayClient;
use TelePay\TelePayEnvironment;

$clientSecret = "YOUR API SECRET KEY";

$environment = new TelePayEnvironment($clientSecret);

$telepay = new TelePayClient($environment);

$me = $telepay->getMe();
print_r($me);

?>
