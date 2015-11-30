<?php
error_reporting(0);
require_once('../database.php');
$mnm=mysql_query("SELECT * FROM `searching_words` order by  count desc");
while($oj=mysql_fetch_object($mnm))
 {
 ?>

   <div style=" margin-left:0px; width:200px; word-wrap:break-word; float:left;"><?php echo $oj->search_word; ?></div>
   
 <!--  <div style="  width:134px; float:left;  word-wrap:break-word; "><?php echo $oj->search_word; ?></div>-->
    <div style=" width:150px;  float:left;  word-wrap:break-word; "><?php echo $oj->count; ?></div>
     <div style=" width:76px; float:left;   word-wrap:break-word; "><?php echo $oj->date; ?></div>
 
    
          <?php
  

 }
  
mysql_close();

  ?>

