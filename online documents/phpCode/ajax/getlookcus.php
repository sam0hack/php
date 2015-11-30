<?php
error_reporting(0);
require_once('../database.php');
$get=$_REQUEST['cms'];
//$div=$_REQUEST['div'];

if(isset($get)){
  $queryString=mysql_real_escape_string($get);
  if(strlen($queryString)>0){
    $query=mysql_query("select * from keywords where keywords like'$get%'");
    if((mysql_num_rows($query))!=0){
      while($result=mysql_fetch_object($query)){
        echo '<li style="list-style:none;cursor:pointer" onClick="fill2(\''.$result->keywords.'\');">' .$result->keywords.'</li>';
      }
    }
    else
    {
        echo 'No Result found';
    }
  }
}
mysql_close();
?>
