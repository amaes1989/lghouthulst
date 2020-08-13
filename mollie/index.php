<?php
/*
 * Make sure to disable the display of errors in production code!
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR ."autoload.php";
//require_once __DIR__ . "functions.php";
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/developers/api-keys
 */
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_x3z3KAJjdrEAWuqzHs5nvREvUJhap6");

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => "10.00"
    ],
    "description" => "My first API payment",
    "redirectUrl" => "https://www.lghouthulst.be/mollie/ordercompleted.php",
    "webhookUrl"  => "https://www.lghouthulst.be/mollie/webhook.php",
]);

session_start();
$_SESSION["mollie-id"] = $payment->id;

header("Location: " . $payment->getCheckoutUrl(), true, 303);

?>