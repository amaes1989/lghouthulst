<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$eventtypeevent = new EventTypeEvent();
$events = Event::find_all ();
$types = Typeevent::find_all ();
if (isset( $_POST['submit'] )) {

    if ($eventtypeevent) {
        $eventtypeevent->eventid = $_POST['eventid'];
        $eventtypeevent->typeeventid = $_POST['typeeventid'];
        $eventtypeevent->prijs = $_POST['prijs'];

        $eventtypeevent->save();

        redirect ('prices.php');

    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Nieuwe prijs</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="eventid">evenement</label>
                        <select name="eventid">
                            <option value="leeg">-- Selecteer een evenement --</option>
                            <?php
                            foreach ($events as $event){
                                echo "<option value=" . $event->id . ">". $event->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="typeeventid">Type</label>
                        <select name="typeeventid">
                            <option value="leeg">-- Selecteer een type --</option>
                            <?php
                            foreach ($types as $type){
                                /*if($eventtypeevent->typeeventid == $type->id)*/
                                echo "<option value=" . $type->id . ">". $type->type . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prijs">Prijs</label>
                        <input type="number" name="prijs" class="form-control">
                    </div>

                    <input type="submit" name="submit" value="Voeg prijs toe" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
