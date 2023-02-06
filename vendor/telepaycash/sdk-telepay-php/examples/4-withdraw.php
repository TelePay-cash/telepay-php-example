<?php
namespace Examples;

require __DIR__ . '/../vendor/autoload.php';

use TelePay\TelePayClient;
use TelePay\TelePayEnvironment;
use TelePay\TelePayWithdrawInput;

$clientSecret = "YOUR API SECRET KEY";

$telepay = new TelePayClient(new TelePayEnvironment($clientSecret));

$withdraw = new TelePayWithdrawInput("TON", "TON", "testnet", "2", "EQCMwbXqm0ccV2zeInCszTRySGlJ4g3CcXA8D67qOqeCV7yU");
$withdraw->setMessage("for my savings account");

$respWithdrawFee = $telepay->getWithdrawFee($withdraw);
print_r($respWithdrawFee);

$respWithdraw = $telepay->withdraw($withdraw);
print_r($respWithdraw);
