<?php include ("includes/header.php"); ?>
<?php
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
if(empty($_GET['id'])){
    redirect ('voordelenlid.php');
}

$voordeel = Voordeellid::find_by_id ($_GET['id']);
if($voordeel){
    $voordeel->delete();
    redirect ('voordelenlid.php');
}else{
    redirect ('voordelenlid.php');
}
?>
<?php include ("includes/sidebar.php.php"); ?>
<?php include ("includes/content-top.php.php"); ?>
<h1>Welkom delete pagina</h1>
<?php include ("includes/footer.php.php"); ?>
