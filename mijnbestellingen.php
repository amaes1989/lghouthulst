<?php
include ('admin/includes/init.php');
include ('includes/header.php');

if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
if(!$session->is_signed_in ()){
    redirect ('login.php');
}

if($session->is_signed_in ()){
    /* redirect ("index.php");*/
    $user = User::find_by_id ($session->user_id);
}

if(empty($_GET['id'])){
    redirect ('index.php');
}
$bestellingen = Bestelling::find_all_by_user($user->id);
$users = User::find_all ();
$eventstypesevents = EventTypeEvent::find_all ();
$typesevents = Typeevent::find_all ();
$events = Event::find_all ();

?>
        <div class="blog-details pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-details-info">
                            <h1>Mijn bestellingen</h1>

                            <table class="table table-header myTable">
                                <thead>
                                <tr>

                                    <th>Event</th>
                                    <th>TypeEvent</th>
                                    <th>Aantal</th>
                                    <th>Prijs per stuk</th>
                                    <th>Totaal prijs</th>

                                    <!--<th>Wijzig?</th>
                                    <th>Delete?</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($bestellingen as $bestelling) :?>
                                    <tr>

                                        <td><?php foreach ($eventstypesevents as $eventtypeevent){
                                                if($bestelling->eventtypeeventid == $eventtypeevent->id){
                                                    foreach ($events as $event){
                                                        if($eventtypeevent->eventid == $event->id){
                                                            echo $event->name;
                                                        }
                                                    }
                                                    /*echo $eventtypeevent->eventid;*/
                                                }
                                            }
                                            /*echo $bestelling->eventtypeeventid;*/ ?></td>
                                        <td><?php foreach ($eventstypesevents as $eventtypeevent){
                                                if($bestelling->eventtypeeventid == $eventtypeevent->id){
                                                    foreach ($typesevents as $typeevent){
                                                        if($eventtypeevent->typeeventid === $typeevent->id){
                                                            echo $typeevent->type;
                                                        }
                                                    }
                                                    /* echo  $eventtypeevent->typeeventid;*/
                                                }
                                            }
                                            /*echo $bestelling->eventtypeeventid;*/ ?></td>
                                        <td><?php echo $bestelling->aantal; ?></td>

                                        <td><?php echo $bestelling->unitprice . ' Euro'; ?></td>


                                        <td><?php $totaal = $bestelling->aantal * $bestelling->unitprice;
                                            echo $totaal . ' Euro'?></td>

                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- shopping-cart-area end -->
		<?php include ('includes/footer.php'); ?>