<?php 
ob_start();
error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
}
?>
<?php
$username=$_SESSION['username'];
$cod=$_SESSION['con_id'];
require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
require 'functions/sam_img_lib.php';

$sdf=mysql_query("select city  from doctor_detail where email='$username'")or die(mysql_error());
$ftch=mysql_fetch_row($sdf);

?>
 <div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container" >
<div class="hero-unit1 h_top2 r_b2" style="background:#446172 !important;  border-radius:3px; margin-top:2px;  color:#fff; " >
<div class="row">

<?php
#validation and required files goes here
//require 'database.php';
?>

<form action="addpacakage_processer.php" method="post">

<div style="text-align:center;">Package Name:		<input required type="text" name="packname"></div>
<div  style="text-align:center;">Pacakge Details:	<input required type="text" name="packdetail"></div>
<div  style="text-align:center;">Package Cost:		<input  type="text" name="packcost" style="margin-left:15px;"></div>
<div  style="text-align:center; margin-left:-9px;">Package Discount:<input value="0" type="text" name="packdiscount"></div>
<div  style="text-align:center; margin-left:78px;">City:<input type="text" value="<?php echo $ftch[0]; ?>" name="city" ></div>
<div  style="text-align:center; margin-left:50px;">Speciality<select name="mcat" style="width:226px">
<?php
$getkeys=mysql_query("select * from main_keys where status=0 ORDER BY  `main_keys`.`id` DESC ");
$r=1;
echo '<option>Choose speciality</option>';
while($fetchkeys=mysql_fetch_array($getkeys))
{
$mid=$fetchkeys['id'];
$mkey=$fetchkeys['mkey'];

echo '<option value="'.$mid.'">'.$mkey.'</optin>';
$r++;
}
?>
</select></div>
<div><input type="hidden" value="NOTNULL11101011000011101010111010101011111000101010100110110111101110110111" name="nxt"></div>
<div  style="text-align:center; margin-left:120px;"><input type="submit" name="sdds" value="Add package" class="btn-success" style="height:32px; border-radius: 7px"></div>

</form>
</div>