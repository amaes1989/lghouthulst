<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('users.php');
}

$plaats = Plaats::find_by_id ($_GET['id']);


if (isset( $_POST['submit'] )) {

    if ($plaats) {
        $plaats->name = $_POST['name'];
        $plaats->street = $_POST['street'];
        $plaats->number = $_POST['number'];
        $plaats->zip = $_POST['zip'];
        $plaats->city = $_POST['city'];
        $plaats->phone = $_POST['phone'];
        $plaats->contactpersoon = $_POST['contactpersoon'];
        $plaats->save ();
        redirect ('plaatsen.php');
    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Edit user</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $plaats->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $plaats->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="street">Straat</label>
                        <input type="text" name="street" class="form-control" value="<?php echo $plaats->street; ?>">
                    </div>
                    <div class="form-group">
                        <label for="number">Nummer</label>
                        <input type="text" name="number" class="form-control" value="<?php echo $plaats->number; ?>">
                    </div>
                    <div class="form-group">
                        <label for="zip">Postcode</label>
                        <input type="text" name="zip" class="form-control" value="<?php echo $plaats->zip; ?>">
                    </div>
                    <div class="form-group">
                        <label for="city">Gemeente</label>
                        <input type="text" name="city" class="form-control" value="<?php echo $plaats->city; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $plaats->phone; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contactpersoon">Contactpersoon</label>
                        <input type="text" name="contactpersoon" class="form-control" value="<?php echo $plaats->contactpersoon; ?>">
                    </div>

                    <input type="submit" name="submit" value="Update plaats" class="btn btn-primary">
                    <a href="delete_plaats.php?id=<?php echo $plaats->id; ?>" class="btn btn-danger">
                        Delete Plaats
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
