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
require_once 'data_handler.php';
require 'PHPMailer_v5.1/class.phpmailer.php';
require_once 'varfilter.php';
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
$lname=$file['lastname'];
$gen=$file['gender'];
$city=$file['city'];



//INSERT DATA INTO VERIFIED DOCTORS TABLE
mysql_query("insert into doctor_detail

(`id`,`pic`,`name`,`email`,`phone`,`password`,`security_q`,`security_a`,`status`,`lastname`,
`address`,`gender`,`speciality`,`department`,`facebook`,`twitter`,`linkedin`,`googleplus`,`myweb`,`myclinic`,`city`)
VALUES('NULL','NULL','$name','$email','$phone','$password','$security_q','$security_a','1','$lname','NULL','$gen',
'NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','$city') ")or die(mysql_error()."lxz");
//SET LOGIN FOR THIS USER

$seler=mysql_query("select id from doctor_detail where password='$password' AND email='$clientemail' ")or die(mysql_error());
$dic=mysql_fetch_row($seler);
$docid=$dic[0];

$Token=rand_chars("ABCEDFGhijklmnopqrst1234567890", 20);



mysql_query("insert into doctor_login values('$docid','$email','$password','','$Token')")or die(mysql_error()."poll");

//DALETE DATA FROM TMP TABLE
mysql_query("delete from tmp_table where id='$id' AND email='$email'") or die(mysql_error()."oops");
//

// login_data($docid,$email,$password,$Token);



/////////////////My Mailing System Start Here//////////////////////////////////////
    $mail = new PHPMailer;

	$mail->IsSMTP();                                      // Set mailer to use SMTP
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

	echo 'Message has been sent <a href="doctorhome.php">Home</a>';
	//////////////////////////////My Mailing System End Here//////////////////////////////
	exit();


//
}
?>
