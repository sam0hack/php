<?php
ob_start();
session_start();
//error_reporting(0);
$username=$_SESSION['username'];
require 'database.php';
require 'PHPMailer_v5.1/class.phpmailer.php';
require 'passwordgen.php';
require_once 'varfilter.php';

//SET UP VERIABLES//

$clientemail=$_REQUEST['email'];

if (empty($clientemail))
{
//echo "Please use a valid email address";
header('location: index.php');
	exit();
}
///////////////PASSWORD GENERATOR/////////////////////
$result="";
$clintpassword= Generator($result);
////////////////////////////PASSWORD GEN END/////////////////////////////

//CHECK USER ALREADY REGISTERED OR NOT///////////////////
$sel=mysql_query("select username from client_login where username='$clientemail'  ")or die(mysql_error());
if (mysql_num_rows($sel)==1)
{
	//echo "User Already Registered <a href='doctorhome.php'>Home</a>";

    /////////////////My Mailing System Start Here//////////////////////////////////////
	$mail = new PHPMailer;

	$mail->IsSMTP();                                      // Set mailer to use SMTP
//	$mail->Host = 'relay-hosting.secureserver.net';  // Specify main and backup server
 $mail->Host = 'smtpout.secureserver.net';  // Specify main and backup server

 $mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = '#';                            // SMTP username
	$mail->Password = '#';                           // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	$mail->From = '#';
	$mail->FromName = 'From Your Doctor';
	$mail->AddAddress(''.$clientemail.'', '#');  // Add a recipient
	//$mail->AddAddress('ellen@example.com');               // Name is optional
	$mail->AddReplyTo(''.$clientemail.'', 'replay to doctor');
	//$mail->AddCC('cc@example.com');
	//$mail->AddBCC('bcc@example.com');

	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->IsHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Your Medical Documents';
	$mail->Body    = 'You have new medical document login with your email and password
                     <a href="http://entspecialistnoida.com/docs/index.php">Click Here to login</a>';
	$mail->AltBody = 'You have new medical document login with your email and password
                     <a href="http://entspecialistnoida.com/docs/index.php">Click Here to login</a>';
	if(!$mail->Send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
	}

	echo 'Message has been sent <a href="doctorhome.php">Home</a>';
	//////////////////////////////My Mailing System End Here//////////////////////////////
	exit();
}

$Token=rand_chars("AaBbCcEeDdFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtuUvVWWxXYZyz1234567890", 54);
mysql_query("insert into client_login VALUES('','$clientemail','$clintpassword','','$Token')")or die(mysql_error());

$rtrt=mysql_query("select * from client_login where con_id='$Token'")or die(mysql_error()."There is an ERROR");
$erty=mysql_fetch_array($rtrt);
 $conid=$erty['con_id'];
echo $clientid=$erty['client_id'];
echo $eml=$erty['username'];


$rtrt2=mysql_query("select client_phone from mydocs where cod='$Token'")or die(mysql_error()."FUCK OFF");
$erty2=mysql_fetch_array($rtrt);
echo $phn=$erty2[0];
require_once 'data_handler.php';

patient_profile($clientid,$eml,$phn,$Token);

/////////////////My Mailing System Start Here//////////////////////////////////////
$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'hr@elvishhealthsolutions.com';  // Specify main and backup server

$mail->Host = 'smtpout.secureserver.net';  // Specify main and backup server

$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hr@elvishhealthsolutions.com';                            // SMTP username
$mail->Password = 'test12345';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'hr@elvishhealthsolutions.com';
$mail->FromName = 'From Your Doctor';
$mail->AddAddress(''.$clientemail.'', 'elvish');  // Add a recipient
//$mail->AddAddress('ellen@example.com');               // Name is optional
$mail->AddReplyTo(''.$clientemail.'', 'replay to doctor');
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your Medical Documents';
$mail->Body    = 'This mail contain link to your <b>medical document</b> to view your account
                           <a href="http://entspecialistnoida.com/documents/index.php">Click Here</a>
                          <br/>Your Username is : '.$clientemail.'
                          <br/>Your Password  is : '.$clintpassword.' ';
$mail->AltBody = 'This mail contain link to your <b>medical document</b> to view your account
                           <a href="http://entspecialistnoida.com/documents/index.php">Click Here</a>
                          <br/>Your Username is : '.$clientemail.'
                          <br/>Your Password  is : '.$clintpassword.' ';
if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent <a href="doctorhome.php">Home</a>';
//////////////////////////////My Mailing System End Here//////////////////////////////


?>
