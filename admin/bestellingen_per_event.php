<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
if(empty($_GET['id'])){
    redirect ('events.php');
}
$event = Event::find_by_id ($_GET['id']);

$bestellingen = Bestelling::find_all();
$users = User::find_all ();
$eventstypesevents = EventTypeEvent::find_all ();
$typesevents = Typeevent::find_all ();
/*$events = Event::find_all ();*/
$totaal = 0;

include ("includes/sidebar.php");
include ("includes/content-top.php");
?>
    <div class="row">
        <h2>Inschrijvingen <?php echo $event->name; ?></h2>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>TypeEvent</th>
                <th>Aantal</th>
                <th>Prijs per stuk</th>
                <th>Totaal prijs</th>
                <th>Besteld door</th>
                <!--<th>Wijzig?</th>
                <th>Delete?</th>-->
            </tr>
            </thead>
            <tbody>

                <?php
                foreach ($bestellingen as $bestelling){
                    foreach ($eventstypesevents as $eventtypeevent){
                        if($bestelling->eventtypeeventid == $eventtypeevent->id AND $eventtypeevent->eventid ==$event->id){
                            echo '<tr>';
                            echo '<td>' . $bestelling->id . '</td>' ;
                            foreach ($typesevents as $typeevent){
                                if($eventtypeevent->typeeventid == $typeevent->id){
                                    echo '<td>' . $typeevent->type . '</td>';
                                }
                            }

                            echo '<td>' . $bestelling->aantal . '</td>';
                            echo '<td>' . $bestelling->unitprice . ' Euro</td>';
                            $totaalbestellijn = $bestelling->aantal * $bestelling->unitprice;
                            $totaal += $totaalbestellijn;
                            echo '<td>' . $totaalbestellijn . ' Euro</td>';
                            foreach ($users as $user){
                                if($bestelling->userid == $user->id){
                                    echo '<td>' . $user->first_name . ' ' . $user->last_name . '</td>';
                                }
                            }

                            echo '</tr>';
                        }

                    }

                }
                ?>

            </tbody>
        </table>
        <h3>Totaal bedrag voor dit evenement: <?php echo $totaal ?> Euro</h3>
    </div>
    <!--End Main-->
<?php

include ("includes/footer.php");
?>