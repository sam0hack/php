<?php
ob_start();
error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');	
}
require 'headwithsearch.php';
require 'varfilter.php';
session_start();
$username=$_SESSION['username'];
require 'database.php';
if (isset($_POST['srch']))
{
	$s=$_POST['srch_txt'];
$srch_txt=unhack($s);
	//echo '<div class="row" style="padding:20px">';
	if (!empty($srch_txt))
	{
$engine=mysql_query("select * from mydocs where img_name OR details like'%".$srch_txt."%' AND doctor_name='$username'  order by img_name asc   ")or die(mysql_error()." Searching Error line no 7 search.php");		

?>
<div class="container">
	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">
    	<div class="span7"><?php echo $ic; 
   	
    	
    	?></div>
        	<div class="span4 text-right">
                <form method="post" action="search.php" class="" style="">
                        <input type="text" name="srch_txt" class="input-medium search-query">
                        <button type="submit" name="srch" class="btn btn-success">Search</button>
                  </form>
                  </div>
                  <div style="clear:both"></div>
			</div>
			
<?php 
$c=0;
while ($search=mysql_fetch_array($engine))
{
		
	$docs_id=$search['docs_id'];
	$img=$search['img'];
	$file_name=$search['img_name'];
	$details=$search['details'];
	$date=$search['doc_date'];
	$cf=$search['current_folder'];
	//echo '<br/>';
	//echo ' <a href="'.$img.'"><img src="'.$img.'" height="50px"/></a> <input type="text" value="'.$file_name.'" readonly>  <input type="text" value="'.$details.'" readonly>  <input type="text" value="'.$date.'" readonly>';
	?>
	<div class="span2"><?php 	echo ' <a href="images.php?i='.$img.'&f='.$cf.'"><img src="'.$img.'" /></a>';
  	 				 ?></div>
                    <div class="span2"><?php echo '<a href="edit.php?page='.$docs_id.'">'.$file_name.'</a>';?></div>
                    <div class="span2"><?php echo $details;?></div>
                    <div class="span3"><?php echo $date;?></div>
                  <div class="span2"><?php echo $client_phone;?></div>
                    <div style="clear:both; margin:25px 0px;"></div>
                    <!--database fetch value-->
                    <div class="span2" id="name"></div>
                    <div class="span2" id="name"></div>
                    <div class="span2" id="name"></div>
                    <div class="span3" id="name"></div>
                     <div class="span2" id="date"></div>
 
	
	 	
<?php 
$c++;
}	
$ic=$c;

//echo ' </div>';
echo '<br/><a href="index.php" /><h3>Go Back</h3></a>';	
	}
	
else 
	{
		echo "Please Enter a keyword to search";
		echo '<br/><a href="index.php" /><h3>Go Back</h3></a>';	
		
	}
	
	
	if (mysql_num_rows($engine)==0) {
	echo "your query for <b> '.$srch_txt.' </b> is not found " ;
}	
	
	
	
	
}
else 
{
header('location: index.php');	
}
?>