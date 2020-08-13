<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$types = Typeevent::find_all ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Types evenementen</h2>
        <a href="add_type.php" class="btn btn-primary rounded-0"><i class="fas fa-plus-square"></i></a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($types as $type) :?>
                <tr>
                    <td><?php echo $type->id; ?></td>
                    <td><?php echo $type->type; ?></td>

                    <td><a href="edit_typeevent.php?id=<?php echo $type->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_typeevent.php?id=<?php echo $type->id; ?>" class="btn btn-danger rounded-0">
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