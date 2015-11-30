<?php
#/opt/lampp/
/*
*@author sameer
*@version 0.1
*@description this class contains two mathods for inserting user search query into database
*
*/
require_once 'database.php';

class search
{

 private $date;
function __construct()
 {
    date_default_timezone_set('Asia/Kolkata');
    $this->date = date('Y-m-d');
 }


function search_word($sw)
{

$d= $this->date; 
$k=mysql_query("select search_word from searching_words  where search_word='$sw'");
$kk=mysql_query("select count from searching_words  where search_word='$sw'");
if(mysql_num_rows($k)!=0)
    {
          $j=mysql_fetch_array($kk);
           $c=$j[0];
          $fc=$c+1;
          mysql_query("update searching_words set count='$fc',date='$d' where search_word='$sw' ");
         
          
    }
else
    {
mysql_query("insert into searching_words (`id`,`search_word`,`count`,`date`)
	     values('NULL','$sw','1','$d')
")or die(mysql_error()."INSER ERROR 504");
    }

}

function search_doc($sd)
{

$d= $this->date; 
$k=mysql_query("select doc from doctor_search_count  where doc='$sd'");
$kk=mysql_query("select count from doctor_search_count  where doc='$sd'");
if(mysql_num_rows($k)!=0)
    {
          $j=mysql_fetch_array($kk);
           $c=$j[0];
          $fc=$c+1;
          mysql_query("update doctor_search_count set count='$fc',date='$d' where doc='$sd' ");
         
          
    }
else
    {
mysql_query("insert into doctor_search_count (`id`,`doc`,`count`,`date`)
	     values('NULL','$sd','1','$d')
")or die(mysql_error()."INSER ERROR 504");
    }

}




}




?>
