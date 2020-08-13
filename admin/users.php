<?php
include ("includes/header.php");
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
$users = User::find_all ();
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

    <div class="row">
        <h2>Gebruikers</h2>
        <a href="add_user.php" class="btn btn-primary rounded-0"><i class="fas fa-user-plus"></i></a>
        <table class="table table-header myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Functie</th>
                <th>Wijzig?</th>
                <th>Delete?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) :?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                   <td><img src="<?php echo $user->image_path_and_placeholder(); ?>" height="40" width="40" alt=""></td>

                    <td><?php echo $user->username; ?></td>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                    <td><?php
                        switch ($user->functie){
                            case 1:
                                echo "Voorzitter";
                                break;
                            case 2:
                                echo "Ondervoorzitter";
                                break;
                            case 3:
                                echo "Penningmeester";
                                break;
                            case 4:
                                echo "Secretaris + Fotograaf";
                                break;
                            case 5:
                                echo "Website + uitnodigingen";
                                break;
                            case 6:
                                echo "Bestuurslid";
                                break;
                            case 7:
                                echo "Lid";
                                break;
                            case 8:
                                echo "Geen lid";
                                break;
                        }
                        ?></td>

                    <td><a href="edit_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-user-edit"></i></a></td>
                    <td><a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger rounded-0">
                            <i class="fas fa-user-slash"></i>
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