<?php
require 'varfilter.php';
session_start();
if(!empty($_SESSION['username']))
{
header('location:doctorhome.php');
}
elseif (!empty($_SESSION['cusername']))
{
header('location:clienthome.php');
}
elseif (!empty($_SESSION['ausername']))
{
	header('location: adminhome.php');
}

require 'database.php';
error_reporting(0);

if (isset($_POST['login']))
{
$name=$_POST['username'];
$pass=$_POST['psswd'];
if (empty($name) && empty($pass))
{
$echo = "Please fill username and password";
}
else
{
$username=unhack($name);
$password=unhack($pass);
$finddoc=mysql_query("select username,password,doc_id,con_id from doctor_login where username='$username' AND password='$password' ")or die(mysql_error());
if (mysql_num_rows($finddoc)==1)
{

$m=mysql_fetch_row($finddoc);
$iid=$m[2];
$_SESSION['username']=$username;

$cod=$m[3];
$_SESSION['con_id']=$cod;

$_SESSION['did']=$iid;
header('location: doctorhome.php');
}

$findadmin=mysql_query("select name,password from admin where name='$username' AND password='$password' ")or die(mysql_error());
if(mysql_num_rows($findadmin))
{

$_SESSION['ausername']=$username;
header('location: adminhome.php');

}


else {
$findclient=mysql_query("select username,password,client_id,con_id from client_login where username='$username' AND password='$password' ");
if (mysql_num_rows($findclient)==1)
{

$mss=mysql_fetch_row($findclient);
$ccid=$mss[2];
$_SESSION['cid']=$ccid;

$cod=$mss[3];
$_SESSION['con_id']=$cod;


$_SESSION['cusername']=$username;
header('location: clienthome.php');
}
else
{

$echo= "Wrong username and password";
}
}

}
}




?>
<!doctype html>

<head>

	<!-- Basics -->

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Login</title>

	<!-- CSS -->

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">

</head>

	<!-- Main HTML -->

<body>

	<!-- Begin Page Content -->

	<div id="container">

		<form method="post">

		<label for="name">Username:</label>

		<input type="name" name="username">

		<label for="username">Password:</label>

		<p><a href="ForgotPassword.php">Forgot your password?</a>

		<input type="password" name="psswd">

		<div id="lower">
<?php echo    $echo;?><br/>
<a href="signup_form.php">Create an account</a>
		<input type="checkbox"><label class="check" for="checkbox">Keep me logged in</label>

		<input type="submit" name="login" value="Login">

		</div>

		</form>

	</div>


	<!-- End Page Content -->

</body>

</html>
