<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$vergaderingen = Vergadering::find_all();
//$plaatsen = Plaats::find_all ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Vergaderingen</h2>
        <a href="add_vergadering.php" class="btn btn-primary rounded-0"><i class="fas fa-handshake"></i>Nieuwe vergadering</a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Datum</th>
                <th>Locatie</th>
                <th>Verslag</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($vergaderingen as $vergadering) :?>
                <tr>
                    <td><?php echo $vergadering->id; ?></td>
                    <td><?php echo $vergadering->name; ?></td>
                    <td><?php echo $vergadering->date; ?></td>
                    <td><?php
                            $plaats = Plaats::find_by_id($vergadering->plaatsid);
                        echo $plaats->name;

                        ?></td>
                    <td><a href="vergadering.php?id=<?php echo $vergadering->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-eye"></i></a></td>

                    <td><a href="edit_vergadering.php?id=<?php echo $vergadering->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_vergadering.php?id=<?php echo $vergadering->id; ?>" class="btn btn-danger rounded-0">
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