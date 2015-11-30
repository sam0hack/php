<?php
ob_start();
error_reporting(0);
session_start();
if(empty($_SESSION['ausername']))
{
header('location:index.php');
exit();
}
?>
<?php
require 'admin_headwithsearch.php';
require 'varfilter.php';
require 'database.php';
$username=$_SESSION['ausername'];
?>
<div class="container">
	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">
    	<div class="span7">Welcome <?php echo $username; ?></div>
        	<div class="span4 text-right">
                <form method="post" action="adminsrch.php" class="" style="">
                        <input type="text" name="srch_txt" class="input-medium search-query">
                        <button type="submit" name="srch" class="btn btn-success">Search</button>
                  </form>
                  </div>
                  <div style="clear:both"></div>
			</div>



  <div style="clear:both; margin:10px 0px"></div>


<div class="hero-unit h_top r_b">
    <div class="row">

    <?php
    
    //Need To be design
$mysql=mysql_query("select COUNT()")or die(mysql_error()."DIE");
while($rf=mysql_fetch_array($mysql))
{
?>

<?php 
echo "Name".$rf[1];
echo "Email".$rf[2];
echo "phone".$rf[3];
echo "".$rf[4];
echo "Packageid".$rf[11]; 
?>

<?php
}
    
?>
    
    
    