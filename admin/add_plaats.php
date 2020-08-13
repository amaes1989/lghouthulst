<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$plaats = new Plaats();
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
        redirect ( 'plaatsen.php' );
    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Nieuwe Plaats</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="street">Straat</label>
                        <input type="text" name="street" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="number">Nummer</label>
                        <input type="text" name="number" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="zip">Postcode</label>
                        <input type="text" name="zip" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="city">Gemeente</label>
                        <input type="text" name="city" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="tel" name="phone" class="form-control" ">
                    </div>
                    <div class="form-group">
                        <label for="contactpersoon">Contactpersoon</label>
                        <input type="text" name="contactpersoon" class="form-control" ">
                    </div>
                    <input type="submit" name="submit" value="Add Plaats" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
