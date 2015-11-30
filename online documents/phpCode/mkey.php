
<script type="text/javascript">
function delme(id)
{	
	var txt;
var r = confirm("Do you want deactivate this item!");
if (r == true) {
    txt = "You pressed OK!";
//alert(id);
//window.location('subkey.php?key='+id);
window.location='mkey.php?dl='+id;
} else {
    txt = "You pressed Cancel!";
}
}


function ark(id)
{	
	var txt;
var r = confirm("Do you want  Active this item!");
if (r == true) {
    txt = "You pressed OK!";
//alert(id);
//window.location('subkey.php?key='+id);
window.location='mkey.php?ark='+id;
} else {
    txt = "You pressed Cancel!";
}
}


</script>

<?php
session_start();
require 'database.php';
require 'admin_headwithsearch.php';

if ($_REQUEST['dl']) {

$del=$_REQUEST['dl'];

//mysql_query("delete from main_keys where id='$del' ");

mysql_query("update main_keys set status='1' where id='$del'");

}
if ($_REQUEST['ark']) {

$del=$_REQUEST['ark'];

//mysql_query("delete from main_keys where id='$del' ");

mysql_query("update main_keys set status='0' where id='$del'");

}

if(isset($_POST['asdfg']))
{
$cat=mysql_real_escape_string($_POST['cat']);
$getkeys=mysql_query("select * from main_keys where mkey='$cat'");
if(mysql_num_rows($getkeys)==0)
{
mysql_query("insert into main_keys values('NULL','$cat','0')");
echo "Query has been executed";
}
else
{
echo "already exits in the database";
}
}
?>
<div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:#2B7271 !important; border-radius:3px; height:30px; color:#fff; width: 987px;" >
<div class="row">

	<div class="span2" style="word-wrap:break-word; margin-left:43px; "><h5 style="font-size:16px; line-height:7px; ">
Admin section</h5></div>
    
   
</div>
</div>

<div style="clear:both; "></div>


          
            <div class="hero-unit h_top" style=" background:#5AAEA2!important; margin-top:2px; border-radius:3px;">
            	<div class="row" style="margin-left: 14px;margin-bottom: 32px;">
<form method="post">
<div style="float:left; padding: 6px; color:#FFF; font-size:16px; font-weight:bold;">Specialty</div>
<div style="float:left; padding: 6px;"><input type="text" name="cat"></div>
<div style="float:left; padding: 6px;"><input type="submit" name="asdfg" class="btn-success" style="height:32px; border-radius: 7px"></div>
</form>
</div>
</div>
<div class="hero-unit h_top" style="padding:0px; margin-top:-28px; background:#6EDEB8 !important;   border-radius:3px;">
            	<div class="row" style="margin-left:20px;">
<?php
$getkeys=mysql_query("select * from main_keys where status!='1' ORDER BY  `main_keys`.`id` DESC ");
$r=1;
while($fetchkeys=mysql_fetch_array($getkeys))
{
$mid=$fetchkeys['id'];
$mkey=$fetchkeys['mkey'];

echo $r . '&nbsp;:&nbsp;&nbsp;<a href="subkey.php?key='.$mid.'&kname='.$mkey.'">'.$mkey.'</a><a onclick="delme(this.id);" id="'.$mid.'" style="font-size: 10px;float: right;height: 13px;width: 24px;" class="btn btn-warning" href="#">Inactive</a><br>';
$r++;
}
?>
</div>
</div>
<h2>Inactive packages</h2><br>
<div class="hero-unit h_top" style="padding:0px; margin-top:-28px; background:#6EDEB8 !important;   border-radius:3px;">
            	<div class="row" style="margin-left:20px;">
<?php
$getkeys=mysql_query("select * from main_keys where status!='0' ORDER BY  `main_keys`.`id` DESC ");
$r=1;
while($fetchkeys=mysql_fetch_array($getkeys))
{
$mid=$fetchkeys['id'];
$mkey=$fetchkeys['mkey'];

echo $r . '&nbsp;:&nbsp;&nbsp;<a href="subkey.php?key='.$mid.'&kname='.$mkey.'">'.$mkey.'</a><a onclick="ark(this.id);" id="'.$mid.'" style="font-size: 10px;float: right;height: 13px;width: 24px;" class="btn btn-success" href="#">Active</a><br>';
$r++;
}
?>
</div>
</div>





</body>
</html>
