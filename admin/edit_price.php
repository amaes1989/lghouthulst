<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$eventtypeevent = EventTypeEvent::find_by_id ($_GET['id']);
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
        <h1>Pas prijs aan</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="eventid">evenement</label>
                        <select name="eventid">
                            <?php
                            foreach ($events as $event){
                                if ($event->id == $eventtypeevent->eventid)
                                {
                                    $selected = 'selected="selected"';
                                }
                                else
                                {
                                    $selected = '';
                                }
                                echo "<option value=" . $event->id .  " " . $selected . ">". $event->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="typeeventid">Type</label>
                        <select name="typeeventid">
                            <?php
                            foreach ($types as $type){
                                if ($type->id == $eventtypeevent->typeeventid)
                                {
                                    $selected = 'selected="selected"';
                                }
                                else
                                {
                                    $selected = '';
                                }
                                echo "<option value=" . $type->id .  " " . $selected . ">". $type->type . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prijs">Prijs</label>
                        <input type="number" name="prijs" class="form-control" value="<?php echo $eventtypeevent->prijs; ?>">
                    </div>

                    <input type="submit" name="submit" value="Pas prijs aan" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
