/////////////////My Mailing System Start Here//////////////////////////////////////
$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'relay-hosting.secureserver.net';  // Specify main and backup server
	//$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'elvish@galaxylifecare.info';                            // SMTP username
	$mail->Password = 'elvish@123';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'elvish@galaxylifecare.info';
$mail->FromName = 'Elvish Health Solutions';
$mail->AddAddress(''.$email.'', 'elvish');  // Add a recipient
//$mail->AddAddress('ellen@example.com');               // Name is optional
$mail->AddReplyTo('elvish@galaxylifecare.info', 'replay to admin');
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