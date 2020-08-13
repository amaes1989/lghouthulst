<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$events = Event::find_all ();
$image = new Image();
if (isset( $_POST['submit'] )) {

    if ($image) {
        $image->alt = $_POST['alternate'];
        $image->eventid = $_POST['event'];
        $image->set_file ($_FILES['image']);
        $image->save_image();

        redirect ('events.php');

    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Voeg foto toe</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">

                    <div class="form-group">
                        <label for="file">Foto evenement</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alternate">Alternatieve tekst</label>
                        <input type="text" name="alternate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="event">Evenement</label>
                        <select name="event">
                            <option value="leeg">-- Selecteer een evenement --</option>
                            <?php
                                foreach ($events as $event){
                                    echo "<option value=" . $event->id . ">". $event->name . " op datum " . $event->date . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Voeg foto toe" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
