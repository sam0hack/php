<?php
ob_start();
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
}
$usernmae=$_SESSION['username'];

require 'database.php';
require 'varfilter.php';

$page=$_REQUEST['page'];
$de=$_REQUEST['d'];
$d=unhack($de);
$page1=unhack($page);
$get=mysql_query("select img,current_folder from mydocs where docs_id='$page1' and doctor_name='$usernmae'");
$fimg=mysql_fetch_array($get);
$rm=$fimg[0];
$folder=$fimg[1];
//unlink($rm);
chmod("mydocs/$usernmae/$page1", 0777);
//rmdir("mydocs/$usernmae/$page1");

	$dir="mydocs/$usernmae/$page1";

$op=opendir($dir);
while ($rr=readdir($op)) {
	
if ($rr!='.' AND $rr!='..') {
	unlink($dir.'/'.$rr);
}

}
rmdir("mydocs/$usernmae/$page1");

mysql_query("delete from linked_data where curent_folder='$folder'")or die(mysql_error());

mysql_query("delete from mydocs where docs_id='$page1' and doctor_name='$usernmae' ")or die(mysql_error());

$c=mysql_query("select no_of_upload from client_login where username='$usernmae'")or die(mysql_error());
$counter=mysql_fetch_array($c);
$counting=$counter[0];
$count=$counter[0]-1;
mysql_query("update client_login set no_of_upload='$count' where username='$d'");

header('location: doctorhome.php');


?>

