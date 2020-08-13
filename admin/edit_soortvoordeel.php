<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}

if(empty($_GET['id'])){
    redirect ('soortenvoordeel.php');
}

$soortvoordeel = Soortvoordeel::find_by_id ($_GET['id']);


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
        <h1>Edit soort voordeel</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $soortvoordeel->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $soortvoordeel->name; ?>">
                    </div>


                    <input type="submit" name="submit" value="Update soort voordeel" class="btn btn-primary">
                    <a href="delete_soortvoordeel.php?id=<?php echo $soortvoordeel->id; ?>" class="btn btn-danger">
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
