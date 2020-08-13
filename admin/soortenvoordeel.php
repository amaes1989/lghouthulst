<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$soortenvoordeel = Soortvoordeel::find_all();

include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Soorten voordeel</h2>
        <a href="add_soortvoordeel.php" class="btn btn-primary rounded-0"><i class="fas fa-plus-square"></i> Nieuw soort</a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($soortenvoordeel as $soortvoordeel) :?>
                <tr>
                    <td><?php echo $soortvoordeel->id; ?></td>
                    <td><?php echo $soortvoordeel->name; ?></td>

                    <td><a href="edit_soortvoordeel.php?id=<?php echo $soortvoordeel->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_soortvoordeel.php?id=<?php echo $soortvoordeel->id; ?>" class="btn btn-danger rounded-0">
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