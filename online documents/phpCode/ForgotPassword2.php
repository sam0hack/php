<?php
ob_start();
error_reporting(0);
require 'database.php';
require 'varfilter.php';
require 'PHPMailer_v5.1/class.phpmailer.php';
if (isset($_POST['submit'])) {

	$email=unhack($_POST['email']);


//Start Validating submitted Date
	if (empty($email))
	{
      $ERROR="Please Enter Your Email Address";
                    //Check for empty field
	}
else{
	$client_check=mysql_query("SELECT username FROM client_login WHERE username='$email'")or die(mysql_error()); //Check for existing user in registered table
	 	if (mysql_num_rows($client_check)==0) {
	 		$ERROR="You email is not found";
	 		$ERROR1="You email is not found";
	 	}
	 	else
	 	{
	 		$ftch=mysql_fetch_array($client_check);
	 		$newemail1=$ftch[0];
	 	}

$doc_check=mysql_query("SELECT username FROM doctor_login WHERE username='$email'")or die(mysql_error()); //Check for existing user in registered table

if(mysql_num_rows($doc_check)==0) {
	$ERROR="You email is not found";
	$ERROR2="You email is not found";
}
else
{
	$ftch=mysql_fetch_array($doc_check);
	$newemail2=$ftch[0];
}



if ($ERROR1==false) {
	$imail=$newemail1;
					}
if ($ERROR2==false) {
	$imail=$newemail2;
}

$client_check1=mysql_query("SELECT password FROM client_login WHERE username='$email'")or die(mysql_error()); //Check for existing user in registered table
if (mysql_num_rows($client_check1)==0) {
	$ERROR11="Password not found";
}
else
{
	$ftch=mysql_fetch_array($client_check1);
	$pass11=$ftch[0];
}

$doc_check2=mysql_query("SELECT password FROM doctor_login WHERE username='$email'")or die(mysql_error()); //Check for existing user in registered table

if(mysql_num_rows($doc_check2)==0) {
	$ERROR22="Password not found";
}
else
{
	$ftch=mysql_fetch_array($doc_check2);
	$pass22=$ftch[0];
}

if ($ERROR11==false) {
	$mypass=$pass11;
}
if ($ERROR22==false) {
	$mypass=$pass22;
}
if (!empty($imail)) {


//IF EVERTHING IS FINE THEN WE ABLE TO SEND THE PASSWORD TO CLIENT EMAIL

/////////////////My Mailing System Start Here//////////////////////////////////////
$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'relay-hosting.secureserver.net';  // Specify main and backup server
	//$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'elvish@galaxylifecare.info';                            // SMTP username
	$mail->Password = 'elvish@123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'elvish@myhealthpackage.com';
$mail->FromName = 'Your Password';
$mail->AddAddress(''.$imail.'', 'elvish');  // Add a recipient
//$mail->AddAddress('ellen@example.com');               // Name is optional
//$mail->AddReplyTo(''.$username.'', 'replay to doctor');
//$mail->AddCC('cc@example.com');
//$mail->AddBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your Password is recovered';
$mail->Body    = 'Hi, User </br> Your password is: '.$mypass;
$mail->AltBody = 'Hi, User </br> Your password is: '.$mypass;
if(!$mail->Send()) {
	$ERROR= 'Message could not be sent.';
	$ERROR= 'Mailer Error: ' . $mail->ErrorInfo;
	exit;
}

$success= 'Email has been sent';
//////////////////////////////My Mailing System End Here//////////////////////////////
}
else

{
	$ERROR="Email not found";
}


}

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password Client</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link href="css/bootswatch.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="css/main-style.css" rel="stylesheet">
  </head>
<body>
<div class="modal" id="myModal" area-hidden="true">
	<div class="modal-header">
    	<h3>Forgot Password</h3>
<font color="lightblue">To Recover your password please Enter Your email address</font>
    </div>
    <div class="modal-body">
    	<form method="post">
                <div class="span2">
                	Email
                </div>
                <div class="span4">
                <input type="email" name="email"  class="span4" />
                </div>
                <!-- dsgf-->

               </div>
<div class="control-group error">
            <label class="control-label" for="inputError"><?php
            if (empty($success)) {
            	echo $ERROR;
            }




            ?></label>
          </div>
                <div class="control-group success">
            <label class="control-label" for="inputSuccess"><?php
            if (empty($ERROR)) {
            	echo $success;
            }

            ?><a href="index.php">Go Back to Login</a></label>
          </div>
               <div class="modal-footer">
    		<input type="submit" value="Submit" name="submit" class="btn btn-success" />
	    </div>
        </form>
        </div>
</div>
</body>
</html>
