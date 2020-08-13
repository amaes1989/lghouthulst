<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('images_event.php');
}else{
    $image = Image::find_by_id ($_GET['id']);
    $events = Event::find_all ();
    if (isset( $_POST['submit'] )) {

        if ($image) {
            $image->alt = $_POST['alternate'];
            $image->eventid = $_POST['event'];
            $image->set_file ($_FILES['image']);
            $image->save_image();

            redirect ('images_event.php');

        }
    }
}

include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Bewerk Foto</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">

                    <div class="form-group">
                        <label for="file">Foto evenement</label><br>
                        <img src="<?php echo $image->picture_path (); ?>" alt="" class="img-fluid" width="200" height="200">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alternate">Alternatieve tekst</label>
                        <input type="text" name="alternate" class="form-control" value="<?php echo $image->alt; ?>">
                    </div>
                    <div class="form-group">
                        <label for="event">Evenement</label>
                        <select name="event">
                            <option value="leeg">-- Selecteer een evenement --</option>
                            <?php
                                foreach ($events as $event){
                                    if ($image->eventid == $event->id){
                                        $selected = 'selected="selected"';
                                    }
                                    else
                                    {
                                        $selected = '';
                                    }
                                    echo "<option value=" . $event->id . ">". $event->name . " op datum " . $event->date . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Bewerk foto" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
