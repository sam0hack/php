<?php
ob_start();
session_start();
if(empty($_SESSION['cusername']))
{
header('location:index.php');
}
$cusernmae=$_SESSION['cusername'];
require 'database.php';
require 'varfilter.php';

$page=$_REQUEST['page'];
$page1=unhack($page);
$get=mysql_query("select img from mydocs where docs_id='$page1' and client_name='$cusernmae'");
	$fimg=mysql_fetch_array($get);
	$rm=$fimg[0];
	unlink($rm);
	chmod("mydocs/clients/$cusernmae/$page1", 0777);
	rmdir("mydocs/clients/$cusernmae/$page1");
	mysql_query("delete from mydocs where docs_id='$page1' and client_name='$cusernmae' ")or die(mysql_error());

	$c=mysql_query("select no_of_upload from client_login where username='$cusernmae'")or die(mysql_error());
	$counter=mysql_fetch_array($c);
	$counting=$counter[0];
	$count=$counter[0]-1;
	mysql_query("update client_login set no_of_upload='$count' where username='$cusernmae'");

	header('location: clienthome.php');


?>

