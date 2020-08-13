<?php
include ('admin/includes/init.php');
include ('includes/header.php');

if (empty($_GET['id'])){
    redirect ('activiteiten.php');
}

$event = Event::find_by_id ($_GET['id']);
$image = Image::find_by_eventid ($event->id);
$plaats = Plaats::find_by_id ($event->plaatsid);
$eventstypeevents = EventTypeEvent::find_all ();
$typesevents = Typeevent::find_all ();
?>
<!-- shopping-cart-area start -->
<div class="blog-details pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-info">
                    <div class="blog-meta">
                        <ul>
                            <li><?php echo $event->wie; ?></li>
                            <li><?php echo $event->date; ?></li>
                        </ul>
                    </div>
                    <h3><?php echo $event->name; ?></h3>
                    <img src="admin/img/<?php echo $image->name; ?>" alt="<?php echo $image->alt; ?>">
                    <p><?php echo $event->uitleg_event; ?></p>
                    <div class="blog-feature">
                        <h5>Voor wie?</h5>
                        <p><?php echo $event->wie ?></p>
                    </div>
                    <div class="blog-feature">
                        <h5>Waar en wanneer?</h5>
                        <p><?php echo $event->date . ' om ' . $event->uur;?></p>
                        <p><?php echo $plaats->name; ?><br><?php echo $plaats->street . ' ' . $plaats->number; ?><br><?php echo $plaats->zip . ' ' . $plaats->city; ?> </p>
                    </div>
                    <div class="blog-feature">
                        <h5>Kostprijs?</h5>

                        <?php
                            foreach ($eventstypeevents as $eventtypeevent){
                                if($event->id == $eventtypeevent->eventid){
                                    foreach ($typesevents as $typeevent){
                                        if($eventtypeevent->typeeventid == $typeevent->id){
                                            echo '<p>' . $typeevent->type . ' kost ' . $eventtypeevent->prijs .' Euro </p>';
                                        }
                                    }
                                }
                            }
                        ?>

                    </div>
                    <?php

                    if(new DateTime($event->start_inschrijving) <= new DateTime() AND new DateTime() <= new DateTime($event->stop_inschrijving)){
                    echo '<div class="blog-feature">';
                        echo '<a class="discount-btn btn-hover" href="inschrijving.php?id=' . $event->id . '">';
                            echo 'Ik schrijf mij in voor dit evenement!';
                        echo '</a>';
                    echo ' </div>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->
<?php
include ('includes/footer.php');
?>
