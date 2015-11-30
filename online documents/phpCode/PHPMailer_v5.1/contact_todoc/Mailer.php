<?php


/**
*
*/
class sendmail
{

public $host;
public $username;
public $password;
public $from;
public $fromname;
public $recipient;
public $message;

function __construct($host,$username,$password,$from,$fromname,$recipient,$message)
{

$this->host=		$host;
$this->username=	$username;
$this->password=	$password;
$this->from=		$from;
$this->fromname=	$fromname;
$this->recipient=	$recipient;
$this->message=		$message;
}


function contactmail()
{



/////////////////My Mailing System Start Here//////////////////////////////////////
    $mail = new PHPMailer;

	$mail->IsSMTP();                                      // Set mailer to use SMTP
	$mail->Host =    $this->host;         //'smtpout.secureserver.net';  // Specify main and backup server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = '#';                            // SMTP username
	$mail->Password = '#';                           // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

	$mail->From = '#';
	$mail->FromName = '#';
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
	}

}
	?>
