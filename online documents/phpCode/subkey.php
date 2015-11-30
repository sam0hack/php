<script type="text/javascript">
function delme(id)
{	
	var txt;
var r = confirm("Do you want deactivate this item!");
if (r == true) {
    txt = "You pressed OK!";
var join=document.URL;
var newUrl=join+"&del="+id;
//alert(newUrl);

if(join!=newUrl)
{
window.location=newUrl;
}
else
{
window.location=join;

}
} 
else 
{
    txt = "You pressed Cancel!";
}

}
function ark(id)
{ 
  var txt;
var r = confirm("Do you want activate this item!");
if (r == true) {
    txt = "You pressed OK!";
var join=document.URL;
var newUrl=join+"&ark="+id;
//alert(newUrl);

if(join!=newUrl)
{
window.location=newUrl;
}
else
{
window.location=join;

}
} 
else 
{
    txt = "You pressed Cancel!";
}

}




</script>


<?php 
require 'admin_headwithsearch.php';
session_start();
require 'database.php';

if (isset($_REQUEST['del'])) {
   $dl= $_REQUEST['del'];
mysql_query("update keywords set `status`=1 where `id`='$dl'")or die(mysql_error()."ERROR");


}

if (isset($_REQUEST['ark'])) {
   $dl= $_REQUEST['ark'];
mysql_query("update keywords set `status`=0 where `id`='$dl'")or die(mysql_error()."ERROR");

}


?>


<div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:#70B1D7 !important;  border-radius:3px; height:5px; color:#fff; " >
<div class="row">

<a href="mkey.php" style="margin-left:30px; line-height: 7px; color:#fff;">Go Back</a><br>
</div>
</div>
<div class="hero-unit1 h_top2 r_b2" style="background:#4789AF !important;  border-radius:3px; margin-top:2px;  color:#fff; " >
<div class="row">
<?php

$_SESSION['mkey']=$mkey=mysql_real_escape_string($_REQUEST['key']);
$_SESSION['kname']=$kname=mysql_real_escape_string($_REQUEST['kname']);





if(isset($_POST['adykey']))
{

$kword=mysql_real_escape_string($_POST['kword']);

$getkeys=mysql_query("select * from keywords where main_keyid='$mkey' AND keywords='$kword'");
if(mysql_num_rows($getkeys)==0)
{


$mkey=$_SESSION['mkey'];
mysql_query("insert into keywords values('NULL','$mkey','$kword',0)");
echo "&nbsp;&nbsp;&nbsp;&nbsp;Query has been executed";
}else
{
echo "keyword already exits in the database";
}

}

?>
<p style="margin-left:30px; line-height:22px;">Add keywords to <b><?php echo $_SESSION['kname'];

 ?></b></p>
</div>
</div>
<div class="hero-unit1 h_top2 r_b2" style="background:#18A1BB !important;  border-radius:3px; margin-top:2px; height:25px; color:#fff; " >
<div class="row" style="margin-left:15px;">
<form method="post">
<input type="text" name="kword">
<input type="submit" name="adykey" class="btn-success" style="height:32px; border-radius: 7px; margin-top:-10px;">
</form>
</div>
</div>
<div class="hero-unit1 h_top2 r_b2" style="background:#4EC1EC !important;  border-radius:3px; margin-top:2px;  color:#fff; " >
<div class="row" style="margin-left:15px;">
<?php
$mkey=$_SESSION['mkey'];
$getkeys=mysql_query("select * from keywords where main_keyid='$mkey' AND status=0 ORDER BY  `id` DESC ");
$r=1;
while($fetchkeys=mysql_fetch_array($getkeys))
{
//$mid=$fetchkeys['id'];
$keywords=$fetchkeys['keywords'];
$kid=$fetchkeys['id'];
echo "<br>";
echo $r . '&nbsp;&nbsp;&nbsp;'.$keywords.'<a onclick="delme(this.id,this.name,this.value);" id="'.$kid.'" style="font-size: 10px;float: right;height: 13px;width: 24px;" class="btn btn-warning" href="#">Inactive</a>';
echo "<br>";
$r++;
}
?>
</div>


<h2>Inactive</h2>
<div class="row" style="margin-left:15px;">
<?php
$mkey=$_SESSION['mkey'];
$getkeys=mysql_query("select * from keywords where main_keyid='$mkey' AND status=1 ORDER BY  `id` DESC ");
$r=1;
while($fetchkeys=mysql_fetch_array($getkeys))
{
//$mid=$fetchkeys['id'];
$keywords=$fetchkeys['keywords'];
$kid=$fetchkeys['id'];
echo "<br>";
echo $r . '&nbsp;&nbsp;&nbsp;'.$keywords.'<a onclick="ark(this.id,this.name,this.value);" id="'.$kid.'" style="font-size: 10px;float: right;height: 13px;width: 24px;" class="btn btn-success" href="#">active</a>';
echo "<br>";
$r++;
}
?>
</div>
</div>
</body>
</html>