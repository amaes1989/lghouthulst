<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
if(empty($_GET['id'])){
    redirect ('events.php');
}
$event = Event::find_by_id ($_GET['id']);

$eventstypesevents = EventTypeEvent::find_all ();
$types = Typeevent::find_all ();

include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Prijzen voor <?php echo $event->name; ?></h2>

        <a href="add_price.php" class="btn btn-primary rounded-0"><i class="fas fa-plus-square"> Nieuwe prijs</i></a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Type</th>
                <th>Prijs</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($eventstypesevents as $eventtypeevent) :
                if($eventtypeevent->eventid == $event->id){ ?>
                <tr>
                    <td><?php
                        foreach ($types as $type){
                            if($type->id == $eventtypeevent->typeeventid){
                                echo $type->type;
                            }
                        }?></td>
                    <td><?php echo $eventtypeevent->prijs . " Euro" ;?></td>

                    <td><a href="edit_price.php?id=<?php echo $eventtypeevent->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_price.php?id=<?php echo $eventtypeevent->id; ?>" class="btn btn-danger rounded-0">
                            <i class="fas fa-trash-alt"></i>
                        </a></td>
                </tr>
            <?php } endforeach; ?>
            </tbody>
        </table>
    </div>
    <!--End Main-->
<?php

include ("includes/footer.php");
?>