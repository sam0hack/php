<?php
//session_start();
error_reporting(0);
$usertype=$_SESSION['usertype'];
if($usertype=="doc")
{
header('location: doctorhome.php');
}
if($usertype=="admin"){
header('location: adminhome.php');
}
if($usertype=="cli"){
header('location: clienthome.php');
}

?>