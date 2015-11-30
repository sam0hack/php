<div style="background:#000; width:895px; margin-bottom:20px;height:30px; line-height:30px; margin-left:41px;"><span style="color:#Fff !important;  margin-left:40px; font-size:18px; font-weight:bold;">My Packages</span></div>

<?php
ob_start();
//error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
}
$cod=$_SESSION['con_id'];
$username=$_SESSION['username'];
require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
$qry=mysql_query("select * from packages where doc_id='$username' ORDER BY id DESC")or die(mysql_error()." ERROR 404 Query not found");
?>
<?php
if(!empty($_REQUEST['success']))
{
?>	

<div class="alert alert-success" role="alert">

        <strong>Well done!</strong> <?php echo base64_decode($_REQUEST['success']); ?>.
      </div>
<?php
}
?>

<span style="margin-left: 93px;margin-top: -14px;font-family: monospace;font-size: x-large;padding-bottom: -57px;padding-top: 21px;
    ">Procedure</span>
    <span style="margin-left: 68px;margin-top: -14px;font-family: monospace;font-size: x-large;padding-bottom: -57px;padding-top: 21px;">Package details</span>
    <span style="margin-left: 31px;margin-top: -14px;font-family: monospace;font-size: x-large;padding-bottom: -57px;padding-top: 21px;">Cost(All Inclusive)</span>
<span style="margin-left: 62px;margin-top: -14px;font-family: monospace;font-size: x-large;padding-bottom: -57px;padding-top: 21px;">Discount</span>
<?php
while($faq=mysql_fetch_object($qry))
{
?>
<form method='post' style="margin-left:40px;">
<input type="hidden" value="<?php echo $faq->id; ?>" name="ary[]">
<input type="text" value="<?php echo $faq->package; ?>" name="ary[]">&nbsp;&nbsp;&nbsp;&nbsp;
<textarea   name="ary[]"><?php echo $faq->pdetails; ?></textarea>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" value="<?php echo $faq->cost; ?>" name="ary[]">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" value="<?php echo $faq->discount; ?>" name="ary[]">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Save" name="Update" class="btn btn-primary" style="margin-top:-10px;">
</form>
<br>
<?php
}
?>
<?php
if(isset($_POST['Update']))
{
$ary=$_POST['ary'];

mysql_query("update packages set package='$ary[1]',pdetails='$ary[2]',cost='$ary[3]',discount='$ary[4]' where doc_id='$username' AND id='$ary[0]'")or die(mysql_error()." ERROR UPDATION ERROR 591");
$s=base64_encode("Package has been saved");
header('location:mypackage.php?success="'.$s.'"');




















/*$cnt=count($ary);
$cnt;
$r=0;
for($i=0;$i<$cnt;$i++)
{
echo  $ary[$i];
if($r==4)
{
echo "<br>";
}

$r++;
}
*/

}
?>
