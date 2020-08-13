<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('voordelenlid.php');
}

$voordeel = Voordeellid::find_by_id ($_GET['id']);
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
        <h1>Edit voordeel</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $voordeel->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $voordeel->tekst; ?>">
                    </div>
                    <div class="form-group">
                        <label for="soortvoordeellid">Soort voordeel</label>
                        <select name="soortvoordeellid">
                                                        <?php
                            foreach ($soorten as $soort){
                                if ($voordeel->soortvoordeellid == $soort->id)
                                {
                                    $selected = 'selected="selected"';
                                }
                                else
                                {
                                    $selected = '';
                                }
                                echo "<option value=" . $soort->id . " " . $selected . ">". $soort->name . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="weergeven">weergeven</label>
                        <select name="weergeven">
                            <?php if($voordeel->weergeven == 0){
                                echo '<option value="0" selected="selected">-- Nee --</option>';
                                echo '<option value="1">-- Ja --</option>';
                            }else{
                                echo '<option value="0">-- Nee --</option>';
                                echo '<option value="1" selected="selected">-- Ja --</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <input type="submit" name="submit" value="Update voordeel" class="btn btn-primary">
                    <a href="delete_voordeel.php?id=<?php echo $voordeel->id; ?>" class="btn btn-danger">
                        Delete soort voordeel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
