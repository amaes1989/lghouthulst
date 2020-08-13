<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$bestellingen = Bestelling::find_all();
$users = User::find_all ();
$eventstypesevents = EventTypeEvent::find_all ();
$typesevents = Typeevent::find_all ();
$events = Event::find_all ();

include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Bestellingen</h2>
        <!--<a href="add_vergadering.php" class="btn btn-primary rounded-0"><i class="fas fa-handshake"></i>Nieuwe vergadering</a>-->
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Event</th>
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
            foreach ($bestellingen as $bestelling) :?>
                <tr>
                    <td><?php echo $bestelling->id; ?></td>
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
                    <td><?php
                        foreach ($users as $user){
                            if($bestelling->userid == $user->id){
                                echo $user->first_name . " " . $user->last_name;
                            }
                        }
                        /*echo $bestelling->userid; */?><!--</td>-->

                    <!--<td><a href="edit_vergadering.php?id=<?php /*echo $vergadering->id; */?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_vergadering.php?id=<?php /*echo $vergadering->id; */?>" class="btn btn-danger rounded-0">
                            <i class="fas fa-trash-alt"></i>
                        </a></td>-->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!--End Main-->
<?php

include ("includes/footer.php");
?>