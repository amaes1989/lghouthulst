<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$messages = Bericht::find_all ();

include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Berichten</h2>

        <a href="add_bericht.php" class="btn btn-primary rounded-0"><i class="fas fa-plus-square"> Nieuw bericht</i></a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>id</th>
                <th>Tekst</th>
                <th>Event</th>
                <th>Image</th>
                <th>Weergeven</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($messages as $message) :?>
                <tr>
                    <td><?php echo $message->id; ?></td>
                    <td><?php echo $message->tekst; ?></td>

                    <td><?php
                        $event = Event::find_by_id($message->eventid);
                        echo $event->name;
                        $images = Image::find_all ();
                        foreach ($images as $image){
                            if ($image->eventid == $event->id){
                                $photo = $image->picture_path ();
                            }
                        }
                       /* echo $message->eventid;*/

                        ?></td>
                    <td><img src="<?php echo $photo; ?>" height="62" width="62" alt=""></td>
                    <td><?php
                        if($message->weergeven == 1){
                            echo "Ja";
                        }else{
                            echo "Nee";
                        } ?></td>
                    <!--<td><a href="../message.php?id=<?php /*echo $message->id; */?>" target="_blank" class="btn btn-danger rounded-0"><i class="fas fa-eye"></i></a></td>-->

                    <td><a href="edit_bericht.php?id=<?php echo $message->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_message.php?id=<?php echo $message->id; ?>" class="btn btn-danger rounded-0">
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