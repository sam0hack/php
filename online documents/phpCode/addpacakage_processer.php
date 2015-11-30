<?php
ob_start();
//error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
}
require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
require 'functions/sam_img_lib.php';
if(isset($_POST['addkey']))
{

$kword=mysql_real_escape_string($_POST['kword']);
//$mkey=$_SESSION['mkey'];
	$mcat=$_POST['mcat'];

$getkeys=mysql_query("select * from keywords where keywords='$kword' AND main_keyid='$mcat' AND status=0 ");
if(mysql_num_rows($getkeys)==0)
{



mysql_query("insert into keywords values('NULL','$mcat','$kword','0')");
//echo 'Keyword has been added  <a href="addpacakage_processer.php?fetch=1&mcat='.$mcat.'">GoBack</a>';

header("location:addpacakage_processer.php?fetch=1&mcat=$mcat");

}else
{
echo "keyword already exits in the database";
}

}



?>
<?php
$cod=$_SESSION['con_id'];

?>
<div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:#1C4F6D !important;  border-radius:3px; height:45px; color:#fff; " >
<div class="row" style="margin-left: 10px;line-height: 13px;">
<?php
session_start();
$docemail=$_SESSION['username'];
require 'database.php';
require 'passwordgen.php';
if(isset($_POST['sdf']))
{

//echo "HELLO";
$GX=GeneratorX();

 $packname=$_POST['packname'];
 $packdetail=$_POST['packdetail'];
 $packcost=$_POST['packcost'];
 echo $packdiscount=$_POST['packdiscount'];
 $mcat=$_POST['mcat'];
echo $city=$_POST['city'];
 mysql_query("insert into packages values('NULL','$docemail',
'$packname','$packdetail','$packcost','$packdiscount','$GX','0000-00-00','$city')")or die(mysql_error()."ERROR 404 Query Not Found");

$chk=$_POST['chk'];
foreach($chk as $cey=>$kl)
{

if(!empty($kl))
{
mysql_query("insert into package_keywords values('NULL','$kl','$GX')");

}
}

//echo "Package has been Successfully Created <a href='mypackage.php'>Click Here to view/edit</a>";

header("location:mypackage.php");


}

if($_POST['sdds'])
{
$_SESSION['packname']=$packname=$_POST['packname'];
$_SESSION['packdetail']=$packdetail=$_POST['packdetail'];
$_SESSION['packcost']=$packcost=$_POST['packcost'];
$_SESSION['packdiscount']=$packdiscount=$_POST['packdiscount'];
$mcat=$_POST['mcat'];
$_SESSION['city']=$city=$_POST['city'];
//$nxt=$_POST['nxt'];
?>
Add keywords to your package <form style="height: 25px;margin-bottom: 10px;float: right;" method="post">Add new Keyword <input type="hidden" name="mcat" value="<?php echo $mcat; ?>"> <input type="text" style="height: 15px;" name="kword"><input type="submit" style="height: 25px;margin-bottom: 10px;" name="addkey"></form>
</div>
</div>
<div class="hero-unit1 h_top2 r_b2" style="background:#70B1D7 !important; margin-top:2px;  border-radius:3px;  color:#fff; " >
<div class="row" style="margin-left: 10px;line-height: 13px;">
<form method="post">
<input type="hidden" name="packname" value="<?php echo $packname; ?>">
<input type="hidden" name="packdetail" value="<?php echo $packdetail; ?>">
<input type="hidden" name="packcost" value="<?php echo $packcost; ?>">
<input type="hidden" name="packdiscount" value="<?php echo $packdiscount; ?>">
<input type="hidden" name="mcat" value="<?php echo $mcat; ?>">
<input type="hidden" name="city" value="<?php echo $city; ?>">

<div style="text-align:center; padding:10px; ">

<table border="0" style="margin-left:400px;" >

<?php

$getkeys=mysql_query("select * from keywords where main_keyid='$mcat'  AND status=0 ORDER BY  `id` DESC ");
$r=1;
while($fetchkeys=mysql_fetch_array($getkeys))
{
//$mid=$fetchkeys['id'];
$keywords=$fetchkeys['keywords'];

echo '<tr> <td ><input type="checkbox" name="chk[]" style="float:"left;" value="'.$keywords.'">  </td> <td style="float: left; margin-top: 3px;">'.$keywords .'</td></tr>
' ;


$r++;
}
?>



</table>
<input type="submit" name="sdf" value="Submit" class="btn-success" style="height:32px; border-radius: 7px; background:#006485; margin-top:10px;">
</form>

</div>


<?php
}
























elseif($_REQUEST['fetch'])
{
$packname=$_SESSION['packname'];
$packdetail=$_SESSION['packdetail'];
$packcost=$_SESSION['packcost'];
$packdiscount=$_SESSION['packdiscount'];
$mcat=$_REQUEST['mcat'];
//$nxt=$_POST['nxt'];
?>
Add keywords to your package <form style="height: 25px;margin-bottom: 10px;float: right;" method="post">Add new Keyword <input type="hidden" name="mcat" value="<?php echo $mcat; ?>"> <input type="text" style="height: 10px;"  name="kword"><input type="submit" style="height: 25px;margin-bottom: 10px;" name="addkey"></form>
</div>
</div>
<div class="hero-unit1 h_top2 r_b2" style="background:#70B1D7 !important; margin-top:2px;  border-radius:3px;  color:#fff; " >
<div class="row" style="margin-left: 10px;line-height: 13px;">
<form method="post">
<input type="hidden" name="packname" value="<?php echo $packname; ?>">
<input type="hidden" name="packdetail" value="<?php echo $packdetail; ?>">
<input type="hidden" name="packcost" value="<?php echo $packcost; ?>">
<input type="hidden" name="packdiscount" value="<?php echo $packdiscount; ?>">
<input type="hidden" name="mcat" value="<?php echo $mcat; ?>">

<div style="text-align:center; padding:10px; ">

<table border="0" style="margin-left:400px;" >

<?php

$getkeys=mysql_query("select * from keywords where main_keyid='$mcat' AND status=0 ORDER BY  `id` DESC ");
$r=1;
while($fetchkeys=mysql_fetch_array($getkeys))
{
//$mid=$fetchkeys['id'];
$keywords=$fetchkeys['keywords'];

echo '<tr> <td ><input type="checkbox" name="chk[]" style="float:"left;" value="'.$keywords.'">  </td> <td style="float: left; margin-top: 3px;">'.$keywords .'</td></tr>
' ;


$r++;
}
?>



</table>
<input type="submit" name="sdf" value="Submit" class="btn-success" style="height:32px; border-radius: 7px; background:#006485; margin-top:10px;">
</form>

</div>


<?php
}
?>

</div>
</div>
