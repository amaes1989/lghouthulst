<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$events = Event::find_all_order_by_date_coming ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Evenementen</h2>
        <a href="add_event.php" class="btn btn-primary rounded-0"><i class="fas fa-plus-square"> Nieuw evenement</i></a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Uur</th>
                <th>Start inschrijving</th>
                <th>Stop inschrijving</th>
                <th>Plaats</th>
                <th>Voor Wie?</th>
                <th>Toon prijzen</th>
                <th>Toon evenement</th>
                <th>Toon inschrijvingen</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($events as $event) :?>
                <tr>
                    <td><?php echo $event->name; ?></td>
                    <td><?php echo $event->date; ?></td>
                    <td><?php echo $event->uur; ?></td>
                    <td><?php echo $event->start_inschrijving; ?></td>
                    <td><?php echo $event->stop_inschrijving; ?></td>
                    <td><?php
                        $plaats = Plaats::find_by_id($event->plaatsid);
                        echo $plaats->name;

                        ?></td>
                    <td><?php echo $event->wie; ?></td>
                    <td><a href="prices_per_event.php?id=<?php echo $event->id; ?>" class="btn btn-danger rounded-0">Prijzen</a></td>
                    <td><a href="../activiteit.php?id=<?php echo $event->id; ?>" target="_blank" class="btn btn-danger rounded-0"><i class="fas fa-eye"></i></a></td>
                    <td><a href="bestellingen_per_event.php?id=<?php echo $event->id; ?>" class="btn btn-danger rounded-0">Inschrijvingen</a></td>

                    <td><a href="edit_event.php?id=<?php echo $event->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_event.php?id=<?php echo $event->id; ?>" class="btn btn-danger rounded-0">
                            <i class="fas fa-trash-alt"></i>
                        </a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!--End Main-->
<?php

include ("includes/footer.php");
?>