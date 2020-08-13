<?php include ("includes/header.php"); ?>
<?php
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
if(empty($_GET['id'])){
    redirect ('images_event.php');
}

$image = Image::find_by_id ($_GET['id']);
if($image){
    $image->delete();
    redirect ('images_event.php');
}else{
    redirect ('images_event.php');
}
?>
<?php include ("includes/sidebar.php.php"); ?>
<?php include ("includes/content-top.php.php"); ?>
<h1>Welkom delete pagina</h1>
<?php include ("includes/footer.php.php"); ?>
