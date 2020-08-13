<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$soortvoordeel = new Soortvoordeel();
if (isset( $_POST['submit'] )) {
    if ($soortvoordeel) {
        $soortvoordeel->name = $_POST['name'];

        $soortvoordeel->save ();
        redirect ('soortenvoordeel.php');

    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>nieuw soort voordeel</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control"">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control"">
                    </div>

                    <input type="submit" name="submit" value="Voeg soort voordeel toe" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
