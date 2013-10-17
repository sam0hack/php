<?php
ob_start();
session_start();
//error_reporting(0);
if(empty($_SESSION['ausername']))
{
header('location:index.php');
exit();
}

$username=$_SESSION['ausername'];
require 'database.php';
require 'PHPMailer_v5.1/class.phpmailer.php';

//SET UP VERIABLES//
$clientemail=$_REQUEST['email'];
$id=$_REQUEST['o'];

if (empty($clientemail) && empty($id))
{
header('location: index.php');
	exit();
}



//RECHECK USER User exits///////////////////
$sel=mysql_query("select * from tmp_table where id='$id' AND email='$clientemail' ")or die(mysql_error());
if (mysql_num_rows($sel)==1)
{


$file=mysql_fetch_array($sel);
$img=$file['pic'];
$name=$file['name'];
$email=$file['email'];
$phone=$file['phone'];

$password=$file['password'];
$security_q=$file['security_q'];
$security_a=$file['security_a'];
//INSERT DATA INTO VERIFIED DOCTORS TABLE
mysql_query("insert into doctor_detail VALUES('$id','NULL','$name','$email','$phone','$password','$security_q','$security_a','1') ")or die(mysql_error());
//SET LOGIN FOR THIS USER
mysql_query("insert into doctor_login values('','$email','$password','')")or die(mysql_error());
//DALETE DATA FROM TMP TABLE
mysql_query("delete from tmp_table where id='$id' AND email='$email'") or die(mysql_error());



/////////////////My Mailing System Start Here//////////////////////////////////////
$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtpout.secureserver.net';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Your smtp Username';                            // SMTP username
$mail->Password = 'Your Password';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'elvish@myhealthpackage.com';
$mail->FromName = 'Elvish Health Solutions';
$mail->AddAddress(''.$email.'', 'elvish');  // Add a recipient
//$mail->AddAddress('ellen@example.com');               // Name is optional
$mail->AddReplyTo('elvish@myhealthpackage.com', 'replay to admin');
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your Account has been created';
$mail->Body    = 'Your account has been successfully created now you can login with your  <br/>
		          Username: ' . $email . ' <br/>
		          Password: ' .$password .'
                     <a href="http://entspecialistnoida.com/documents/index.php">Click Here to login</a>';
$mail->AltBody = 'Your account has been successfully created now you can login with your  <br/>
		          Username: ' . $email . ' <br/>
		          Password: ' .$password .'
                     <a href="http://entspecialistnoida.com/documents/index.php">Click Here to login</a>';
if(!$mail->Send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
	exit;
}

header('localhost: adminhome.php?success=Email has been send');
//////////////////////////////My Mailing System End Here//////////////////////////////
exit();


}

?>