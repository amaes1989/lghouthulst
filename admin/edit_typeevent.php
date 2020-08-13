<?php
include ("includes/header.php");
if (!$session->is_signed_in ()) {
    redirect ( 'login.php' );
}
if(empty($_GET['id'])){
    redirect ('typesevents.php');
}

$type = Typeevent::find_by_id ($_GET['id']);

if (isset( $_POST['submit'] )) {

    if ($type) {
        $type->type = $_POST['type'];
        $type->save();

        redirect ('typesevents.php');

    }
}
include ("includes/sidebar.php");
include ("includes/content-top.php");
?>

<div class="row">
    <div class="col-12">
        <h1>Pas type evenement aan</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" readonly name="id" class="form-control" value="<?php echo $type->id; ?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Type evenement</label>
                        <input type="type" name="type" class="form-control" value="<?php echo $type->type; ?>">
                    </div>
                    <input type="submit" name="submit" value="Pas type evenement aan" class="btn btn-primary">

                </div>
            </div>
        </form>
    </div>
</div>

<?php
include ("includes/footer.php");
?>
