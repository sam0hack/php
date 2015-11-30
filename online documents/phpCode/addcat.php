<?php
ob_start();
//error_reporting(0);
session_start();
// if(empty($_SESSION['username']))
// {
// header('location:index.php');
// }


require 'varfilter.php';
require 'database.php';
echo $cat=$_REQUEST['icat'];
echo $folder=$_REQUEST['folder'];
mysql_query("update linked_data set cat='$cat' where curent_folder='$folder'")or die(mysql_error());
mysql_query("update mydocs set cat='$cat' where current_folder='$folder'")or die(mysql_error()."ERR5005");
header("location:images.php?f=$folder");
?>
