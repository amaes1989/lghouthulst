<?php
include ('admin/includes/init.php');
require_once("includes/header.php");?>
<?php
$session->logout ();
redirect ('index.php');
?>
