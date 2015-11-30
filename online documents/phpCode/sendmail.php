<?php
ob_start();
require 'database.php';
require 'PHPMailer_v5.1/class.phpmailer.php';
require 'passwordgen.php';
/**
 * @param Set TO $doctoremail
 * @param Set FROM $clientemail
 * @param Subject of email $subject
 * @param Message $msg
 * @return return a  string
 * @uses sendmail(TO,FROM,SUBJECT,MSG)
 */
function sendmail($doctoremail,$clientemail,$subject,$msg)
{

	$mail = new PHPMailer;

	$mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'relay-hosting.secureserver.net';  // Specify main and backup server
	//$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = '#';                            // SMTP username
	$mail->Password = '#';                           // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	$mail->From = '#';
	$mail->FromName = 'From Your Doctor';
	$mail->AddAddress(''.$clientemail.'', '#');  // Add a recipient
	//$mail->AddAddress('ellen@example.com');               // Name is optional
	$mail->AddReplyTo(''.$doctoremail.'', 'replay to doctor');
	//$mail->AddCC('cc@example.com');
	//$mail->AddBCC('bcc@example.com');

	$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
	//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->IsHTML(true);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $msg;
	$mail->AltBody = $msg;
	if(!$mail->Send()) {
		$rtrn= 'Message could not be sent.';
		$rtrn= 'Mailer Error: ' . $mail->ErrorInfo;
		exit;
	}

	$rtrn= 'Message has been sent <a href="doctorhome.php">Home</a>';

return $rtrn;
}



?>
