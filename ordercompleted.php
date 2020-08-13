<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "mollie" . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";
include ('admin/includes/init.php');
include ('includes/header2.php');
/*session_start();*/
if(array_key_exists ("mollie-id", $_GET)) {
    $_SESSION["mollie-id"] = $_GET["mollie-id"];
}?>
<div class="blog-details pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-info">
<?php
if(array_key_exists ("mollie-id", $_SESSION)){
    /*echo $_SESSION["mollie-id"];*/
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey($mollie_api_key);

    $payment = $mollie->payments->get($_SESSION["mollie-id"]);

   /* echo $payment->status;*/
    if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
        /*
         * The payment is paid and isn't refunded or charged back.
         * At this point you'd probably want to start the process of delivering the product to the customer.
         */?>
        <h3>Bedankt voor uw bestelling!</h3>
        <h4>U heeft betaald! We zien u graag op onze activiteit! Tot dan!</h4>
   <?php } elseif ($payment->isOpen()) {
        /*
         * The payment is open.
         */ ?>
        <h3>Bedankt voor uw bestelling!</h3>
        <h4>Van zodra we uw betaling ontvangen hebben, kan u de inschrijving zien onder de knop 'Mijn bestellingen'! We zien u graag op onze activiteit! Tot dan!</h4>
    <?php } elseif ($payment->isPending()) {
        /*
         * The payment is pending.
         */ ?>
        <h3>Bedankt voor uw bestelling!</h3>
        <h4>Van zodra we uw betaling ontvangen hebben, kan u de inschrijving zien onder de knop 'Mijn bestellingen'! We zien u graag op onze activiteit! Tot dan!</h4>
    <?php } elseif ($payment->isFailed()) {
        /*
         * The payment has failed.
         */?>
        <h3>De bestelling is niet geplaatst!</h3>
        <h4>Onze excuses, maar de betaling is niet gelukt. Gelieve opnieuw te probreren!</h4>
    <?php } elseif ($payment->isExpired()) {
        /*
         * The payment is expired.
         */?>
        <h3>De bestelling is niet geplaatst!</h3>
        <h4>Onze excuses, maar de betaling duurde te lang waardoor deze geannuleerd is. Gelieve opnieuw te probreren!</h4>
<?php } elseif ($payment->isCanceled()) {
        /*
         * The payment has been canceled.
         */?>
        <h3>De bestelling is niet geplaatst!</h3>
        <h4>Onze excuses, maar de betaling is geannuleerd. Gelieve opnieuw te probreren!</h4>

    <?php  }
}

?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ('includes/footer.php');
?>
