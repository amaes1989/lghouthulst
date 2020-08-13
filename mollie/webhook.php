<?
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR ."autoload.php";
include ('../admin/includes/init.php');
include ('../includes/header.php');

//create mollie payment
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey($mollie_api_key);

$payment = $mollie->payments->get( array_key_exists('id', $_POST) ? $_POST["id"] : $_GET["id"]);

$bestellingen = Bestelling::find_all_by_paymentid($payment->id);

foreach($bestellingen as $bestelling)
{
    echo "adjusting bestelling " . $bestelling->id . ' to status ' . $payment->status;
    $bestelling->betaling_status = $payment->status;
    $bestelling->save();
}

if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
    /*
     * The payment is paid and isn't refunded or charged back.
     * At this point you'd probably want to start the process of delivering the product to the customer.
     */
} elseif ($payment->isOpen()) {
    /*
     * The payment is open.
     */
} elseif ($payment->isPending()) {
    /*
     * The payment is pending.
     */
} elseif ($payment->isFailed()) {
    /*
     * The payment has failed.
     */
} elseif ($payment->isExpired()) {
    /*
     * The payment is expired.
     */
} elseif ($payment->isCanceled()) {
    /*
     * The payment has been canceled.
     */
} elseif ($payment->hasRefunds()) {
    /*
     * The payment has been (partially) refunded.
     * The status of the payment is still "paid"
     */
} elseif ($payment->hasChargebacks()) {
    /*
     * The payment has been (partially) charged back.
     * The status of the payment is still "paid"
     */
}
?>