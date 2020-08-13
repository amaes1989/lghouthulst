<?php
include ('admin/includes/init.php');
include ('includes/header.php');

if(!$session->is_signed_in ()){
    redirect ('login.php');
}

if($session->is_signed_in ()){
    /* redirect ("index.php");*/
    $user = User::find_by_id ($session->user_id);
}

if (empty($_GET['id'])){
    redirect ('activiteiten.php');
}

$event = Event::find_by_id ($_GET['id']);
$image = Image::find_by_eventid ($event->id);
$plaats = Plaats::find_by_id ($event->plaatsid);
$eventstypeevents = EventTypeEvent::find_all ();
$typesevents = Typeevent::find_all ();

if (isset( $_POST['submit'] )) {
    require_once __DIR__ . DIRECTORY_SEPARATOR . "mollie" . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR ."autoload.php";
    $bestellingen = array();
    $counter = 0;
    $totalPrice = 0;
    $description = '';
    foreach ($eventstypeevents as $eventtypeevent) {
        if ($event->id == $eventtypeevent->eventid) {
            foreach ($typesevents as $typeevent) {
                if ($eventtypeevent->typeeventid == $typeevent->id) {
                    if ($_POST['aantal-' . $eventtypeevent->id] !== '0') {
                        $description = $event->name . ' (' . $user->first_name . ' ' . $user->last_name .')';
                        $bestelling = new Bestelling();
                        /*We gaan dit moeten doen voor elke lijn dat besteld kan worden, eerst de betaling van het totale bedrag en dan de save voor elke lijn die besteld moet worden (niet nul)*/
                        if ($bestelling) {
                            $bestelling->aantal = $_POST['aantal-'.$eventtypeevent->id];
                            $bestelling->eventtypeeventid = $eventtypeevent->id;
                            $bestelling->unitprice = $eventtypeevent->prijs;
                            $bestelling->userid = $user->id;
                            $bestellingen[$counter] = $bestelling;
                            $counter++;
                            $totalPrice += $bestelling->unitprice * $bestelling->aantal;
                        }
                    }
                }
            }
        }
    }
    /*echo $totalPrice;*/
    if($totalPrice>0){

    //create mollie payment
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey($mollie_api_key);

    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => number_format($totalPrice,2)
        ],
        "description" => $description,
        "redirectUrl" => "https://www.lghouthulst.be/ordercompleted.php",
        "webhookUrl"  => "https://www.lghouthulst.be/mollie/webhook.php",
    ]);

    $_SESSION["mollie-id"] = $payment->id;

    foreach($bestellingen as $bestelling)
    {
        $bestelling->betaling_id = $payment->id;
        $bestelling->betaling_status = $payment->status;
        $bestelling->save();
    }

    header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }else{
        foreach($bestellingen as $bestelling)
        {
            $bestelling->betaling_id = "gratis";
            $bestelling->betaling_status = "paid";
            $bestelling->save();
            redirect ("mijnbestellingen.php?id=".$user->id);
        }
    }
}

?>
<!-- shopping-cart-area start -->
<div class="blog-details pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-info">
                    <h3>Inschrijving <?php echo $event->name; ?></h3>
                    <p><?php echo $user->first_name . " " . $user->last_name; ?></p>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="blog-feature">
                        <?php
                            foreach ($eventstypeevents as $eventtypeevent){
                                if($event->id == $eventtypeevent->eventid){
                                    foreach ($typesevents as $typeevent){
                                        if($eventtypeevent->typeeventid == $typeevent->id){
                                            echo '<p>' . $typeevent->type . ' kost ' . $eventtypeevent->prijs .' Euro </p>';
                                            echo '<table><tr>';
                                            echo '<td>Aantal:</td><td><input type="number" min="0" max="10" name="aantal-' . $eventtypeevent->id .'" value="0" onchange="$(\'#totaal-' . $eventtypeevent->id . '\')[0].innerHTML = ' . $eventtypeevent->prijs . '* this.value + \' Euro\';CalculateTotal()"></td><td><p class="totalen" id="totaal-' . $eventtypeevent->id .'"></p></td>';
                                            echo '</tr></table>';
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                    <p id="totaal"></p>
                        <input type="submit" class="discount-btn btn-hover" name="submit" value="Ik schrijf mij in (en betaal) voor dit evenement!">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->
<script>
    function CalculateTotal()
    {
        var totaal = 0;
        $('.totalen').each(function() {
            if(this.innerHTML !== '')
                totaal+=parseFloat(this.innerHTML.replace(' Euro',''));
        });

        $('#totaal')[0].innerHTML = totaal + " Euro";
    }

</script>
<?php
include ('includes/footer.php');
?>
