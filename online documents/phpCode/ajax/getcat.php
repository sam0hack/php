<?php
error_reporting(0);
require_once('../database.php');
$get=$_REQUEST['cms'];
//$div=$_REQUEST['div'];

if(isset($get)){
  $queryString=mysql_real_escape_string($get);
  if(strlen($queryString)>0){
    $query=mysql_query("select * from mydocs where cat like'$get%' GROUP BY cat");
    if((mysql_num_rows($query))!=0){
      while($result=mysql_fetch_object($query)){ 
        echo '<li style="list-style:none;cursor:pointer" onClick="fill2(\''.$result->cat.'\');">' .$result->cat.'</li>';
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
