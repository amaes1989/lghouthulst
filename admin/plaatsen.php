<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$plaatsen = Plaats::find_all ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Plaatsen waar onze evenementen doorgaan</h2>
        <a href="add_plaats.php" class="btn btn-primary rounded-0"><i class="fas fa-map-marker-alt"></i>Voeg een plaats toe</a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Straat en nummer</th>
                <th>Postcode en gemeente</th>
                <th>Telefoonnummer</th>
                <th>Naam contactpersoon</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($plaatsen as $plaats) :?>
                <tr>
                    <td><?php echo $plaats->id; ?></td>
                    <td><?php echo $plaats->name; ?></td>

                    <td><?php echo $plaats->street . " " . $plaats->number; ?></td>
                    <td><?php echo $plaats->zip . " " . $plaats->city; ?></td>
                    <td><?php echo $plaats->phone; ?></td>
                    <td><?php echo $plaats->contactpersoon; ?></td>

                    <td><a href="edit_plaats.php?id=<?php echo $plaats->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-route"></i></a></td>
                    <td><a href="delete_plaats.php?id=<?php echo $plaats->id; ?>" class="btn btn-danger rounded-0">
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