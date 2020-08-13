<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$vergadering = Vergadering::find_by_id ($_GET['id']);
//$plaatsen = Plaats::find_all ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>


    <a href="vergaderingen.php" class="btn btn-primary rounded-0"><i class="fas fa-backward"></i> Ga terug naar overzicht vergaderingen</a>

        <h1>Vergadering </h1>
<p><?php echo $vergadering->name; ?></p>
        <h2>Datum </h2>
<p><?php echo $vergadering->date; ?></p>

        <h2>Locatie:</h2>
        <p><?php
            $plaats = Plaats::find_by_id($vergadering->plaatsid);
            echo $plaats->name;

            ?></p>

        <h2>Verslag</h2>
        <?php echo $vergadering->verslag; ?>


                    <a href="edit_vergadering.php?id=<?php echo $vergadering->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i> Pas vergadering aan</a>
                    <a href="delete_vergadering.php?id=<?php echo $vergadering->id; ?>" class="btn btn-danger rounded-0">
                            <i class="fas fa-trash-alt"></i> Verwijder vergadering
                        </a>


    <!--End Main-->
<?php

include ("includes/footer.php");
?>