<?php include ("includes/header.php"); ?>
<?php
if(!$session->is_signed_in ()){
    redirect ('login.php');
}
if(empty($_GET['id'])){
    redirect ('plaatsen.php');
}

$plaats = Plaats::find_by_id ($_GET['id']);
if($plaats){
    $plaats->delete();
    redirect ('plaatsen.php');
}else{
    redirect ('plaatsen.php');
}
?>
<?php include ("includes/sidebar.php.php"); ?>
<?php include ("includes/content-top.php.php"); ?>
<h1>Welkom delete pagina</h1>
<?php include ("includes/footer.php.php"); ?>
