<?php
ob_start();
error_reporting(0);
session_start();
if(empty($_SESSION['cusername']) AND empty($_SESSION['username']) AND empty($_SESSION['ausername']))
{
header('location:index.php');
exit();
}
require 'headwithsearch.php';
require 'database.php';
require 'varfilter.php';
$username=$_SESSION['username'];
$cusername=$_SESSION['cusername'];
if (isset($_POST['chng']))
{
	$old=$_POST['oldpwd'];
	$new=$_POST['newpwd'];
	$re=$_POST['repwd'];
//Using Unhack Var
	$oldp=unhack($old);
	$newp=unhack($new);
	$rep=unhack($re);

	if (!empty($oldp) &&!empty($newp) &&!empty($rep))
{
if ($newp==$rep)
{

if(!empty($_SESSION['username']))
{
$getpass=mysql_query("select password from doctor_login where password='$oldp' AND username='$username' ")or die(mysql_error());
if (mysql_num_rows($getpass)==1)
{
mysql_query("update doctor_login set password='$newp' where username='$username'")or die(mysql_error());
$echo= "Password  Changed";
}
else
{
	$echo= "your Old password is incorrect";
}
}

if(!empty($_SESSION['ausername']))
{
	$getpass=mysql_query("select password from admin where password='$oldp' AND name='$username' ")or die(mysql_error());
	if (mysql_num_rows($getpass)==1)
	{
		mysql_query("update admin set password='$newp' where name='$username'")or die(mysql_error());
		$echo= "Password  Changed";
	}
	else
	{
		$echo= "your Old password is incorrect";
	}
}

if(!empty($_SESSION['cusername']))
{
$getpass=mysql_query("select password from client_login where password='$oldp' AND username='$cusername' ")or die(mysql_error());
if (mysql_num_rows($getpass)==1)
{

mysql_query("update client_login set password='$newp' where username='$cusername' ")or die(mysql_error());
$echo ="Password  Changed";
}
else
{
	$echo= "your Old password is incorrect";
}

}


}//Third end
else
{
	$echo ="The Password you typed do not match";
}


}//secound end
else
{
	$echo= "Fill all fields";
}


}//End
?>

<div class="modal" id="myModal" area-hidden="true">
  <div class="modal-header">
    <h3>Change Your Password</h3>
  </div>
  <div class="modal-body">
    <form method="post">
      <div class="row">
        <div class="span2">
          <label for="old">Old Password:</label>
        </div>
        <div class="span4">
          <input type="password" placeholder="Enter Your Old Password" name="oldpwd" size="30">
        </div>
        <div class="span2"> New Password: </div>
        <div class="span4">
          <input type="password" placeholder="Enter New password" name="newpwd" size="30">
        </div>
        <div class="span2"> Re-Password: </div>
        <div class="span4">
          <input type="password" placeholder="Re Enter Your new Password" name="repwd" size="30">
        </div>
        <div class="span2"> <font color="diamond"><?php echo $echo; ?> </font></div>
        <div class="span4">
          <input type="submit" name="chng" value="Change Password" class="btn btn-success">
        </div>
      </div></br>
      <a href="index.php"/>Go Back</a>
    </form>
  </div>
</div>
