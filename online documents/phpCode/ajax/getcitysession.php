<?php
session_start();
//error_reporting(0);
require_once('../database.php');
$get=$_REQUEST['cms'];
//$div=$_REQUEST['div'];
$_SESSION['city']=$get;

?>
