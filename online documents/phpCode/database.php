<?php
$host=mysql_connect("localhost","root","")or die(mysql_error(). " We are not connected to DataBase");
mysql_select_db("myhealthpakege",$host)or die(mysql_error(). " No DataBaes Selected");
?>
