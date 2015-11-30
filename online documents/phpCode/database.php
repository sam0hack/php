<?php
error_reporting(0);
$host=mysql_connect("localhost","root","sam")or die(mysql_error(). " We are not connected to DataBase");
mysql_select_db("myhealthpackage",$host)or die(mysql_error(). " No DataBaes Selected");
?>
