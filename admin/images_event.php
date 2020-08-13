<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$images = Image::find_all ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Foto's voor de evenementen</h2>
        <a href="add_image_event.php" class="btn btn-primary rounded-0"><i class="fas fa-map-marker-alt"></i>Voeg een foto voor een evenement toe</a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Alt</th>
                <th>Event</th>
                <th>Foto</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($images as $image) :?>
                <tr>
                    <td><?php echo $image->id; ?></td>
                    <td><?php echo $image->name; ?></td>

                    <td><?php echo $image->alt; ?></td>
                    <td><?php echo $image->eventid ?></td>
                    <td><img src="<?php echo $image->picture_path();?>" height="62" width="62" alt=""></td>

                    <td><a href="edit_image_event.php?id=<?php echo $image->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-route"></i></a></td>
                    <td><a href="delete_image.php?id=<?php echo $image->id; ?>" class="btn btn-danger rounded-0">
                            <i class="fas fa-road"></i>
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