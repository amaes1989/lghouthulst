<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$voordelen = Voordeellid::find_all();


include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Voordelen</h2>
        <a href="add_voordeel.php" class="btn btn-primary rounded-0"><i class="fas fa-plus-square"></i> Nieuw voordeel</a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>tekst</th>
                <th>Soort voordeel</th>
                <th>Weergeven?</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($voordelen as $voordeel) :?>
                <tr>
                    <td><?php echo $voordeel->id; ?></td>
                    <td><?php echo $voordeel->tekst; ?></td>
                    <td><?php
                        $soort = Soortvoordeel::find_by_id ($voordeel->soortvoordeellid);
                        echo $soort->name;
                        ?></td>
                    <td><?php
                        if($voordeel->weergeven == 1){
                            echo "Ja";
                        }else{
                            echo "Nee";
                        } ?></td>

                    <td><a href="edit_voordeel.php?id=<?php echo $voordeel->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                    <td><a href="delete_voordeel.php?id=<?php echo $voordeel->id; ?>" class="btn btn-danger rounded-0">
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