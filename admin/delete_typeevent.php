<?php include ("includes/header.php"); ?>
<?php
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
if(empty($_GET['id'])){
    redirect ('typesevents.php');
}

$type = Typeevent::find_by_id ($_GET['id']);
if($type){
    $type->delete();
    redirect ('typesevents.php');
}else{
    redirect ('typesevents.php');
}
?>
<?php include ("includes/sidebar.php.php"); ?>
<?php include ("includes/content-top.php.php"); ?>
<h1>Welkom delete pagina</h1>
<?php include ("includes/footer.php.php"); ?>
