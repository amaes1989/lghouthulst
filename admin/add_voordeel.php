<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
$voordeel = new Voordeellid();
$soorten = Soortvoordeel::find_all ();
if (isset( $_POST['submit'] )) {

    if ($voordeel) {
        $voordeel->tekst = $_POST['name'];
        $voordeel->soortvoordeellid = $_POST['soortvoordeellid'];
        $voordeel->weergeven = $_POST['weergeven'];
        $voordeel->save ();
        redirect ('voordelenlid.php');

    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Add voordeel</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control"">
                    </div>
                    <div class="form-group">
                        <label for="soortvoordeellid">Soort voordeel</label>
                        <select name="soortvoordeellid">
                            <option value="leeg">-- Selecteer een plaats --</option>
                            <?php
                                foreach ($soorten as $soort){
                                    echo "<option value=" . $soort->id . ">". $soort->name . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="weergeven">weergeven</label>
                        <select name="weergeven">
                            <option value="0">-- Nee --</option>
                            <option value="1">-- Ja --</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Voeg voordeel toe" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
