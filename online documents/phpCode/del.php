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
$get=mysql_query("select img,current_folder from mydocs where docs_id='$page1' and client_name='$cusernmae'");

	$fimg=mysql_fetch_array($get);
	$rm=$fimg[0];
	$folder=$fimg[1];
	//unlink($rm);
	chmod("mydocs/clients/$cusernmae/$page1", 0777);
	
	$dir="mydocs/clients/$cusernmae/$page1";

$op=opendir($dir);
while ($rr=readdir($op)) {
	
if ($rr!='.' AND $rr!='..') {
	unlink($dir.'/'.$rr);
}

}

$crpf=mysql_query("SELECT COUNT(`curent_folder`) FROM `linked_data` WHERE `curent_folder`='$folder'")or die(mysql_error());
$uiv=mysql_fetch_row($crpf);
$tncf=$uiv[0];
	$c=mysql_query("select no_of_upload from client_login where username='$cusernmae'")or die(mysql_error());
	$counter=mysql_fetch_array($c);
	$counting=$counter[0];
	$count=$counter[0]-$tncf;
	mysql_query("update client_login set no_of_upload='$count' where username='$cusernmae'");




rmdir("mydocs/clients/$cusernmae/$page1");

mysql_query("delete from linked_data where curent_folder='$folder'")or die(mysql_error());
	mysql_query("delete from mydocs where docs_id='$page1' and client_name='$cusernmae' ")or die(mysql_error());


	header('location: clienthome.php');


?>

