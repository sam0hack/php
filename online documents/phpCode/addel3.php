<?php
ob_start();
session_start();
if(empty($_SESSION['ausername']))
{
header('location:index.php');
exit();
}
$usernmae=$_SESSION['username'];

require 'database.php';
require 'varfilter.php';

$id=$_REQUEST['page'];
$status=$_REQUEST['s'];
if ($status==0) {
mysql_query("delete from tmp_table where id='$id' ")or die(mysql_error());
header('location:index.php');
}
if ($status==1) {
	mysql_query("delete from doctor_detail where id='$id'");
header('location:index.php');
}
header('location:index.php');
?>

