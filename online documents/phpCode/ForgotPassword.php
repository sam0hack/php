<?php
ob_start();
error_reporting(0);
require 'database.php';
require 'varfilter.php';
if (isset($_POST['submit'])) {

	$email=unhack($_POST['email']);
	$pass1=unhack($_POST['pass1']);
	$pass2=unhack($_POST['pass2']);
	$sec_q=unhack($_POST['sec_q']);
	$sec_a=unhack($_POST['sec_a']);
	$ERROR="";
//Start Validating submitted Date
	if (empty($email) && empty($pass1) && empty($pass2) && empty($sec_a))
	{
      $ERROR="Please fill all fields";                 //Check for empty field
	}

	if ($pass1 <5) {
		$ERROR="Password must be Greater then 5 character";  //Check password lenghth
	}
	if ($pass1!=$pass2)
	{
		$ERROR="Password not matched";                         //Match paassword
	}
	 	$check1=mysql_query("select username from doctor_login where username='$email'"); //Check for existing user in registered table
	 	if (mysql_num_rows($check1)==0) {
	 		$ERROR="You email is not found";
	 	}

	 	$check2=mysql_query("select * from doctor_detail where email='$email' AND security_q='$sec_q' AND security_a='$sec_a'"); //Match email security q and security a
	 	if (mysql_num_rows($check2)==0) {
	 		$ERROR="Your security Question and Answer is incorrect";
	 	}

if ($ERROR==false) {

	mysql_query("update doctor_login set password='$pass1' where username='$email'")or die(mysql_error());
	mysql_query("update doctor_detail set password='$pass1' where email='$email'")or die(mysql_error());
	$success="Your password has been updated";

}


}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forgot Password</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link href="css/bootswatch.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="css/main-style.css" rel="stylesheet">
  </head>
<body>
<div class="modal" id="myModal" area-hidden="true">
	<div class="modal-header">
    	<h3>Forgot Password Doctor</h3>
    	<a href="ForgotPassword2.php">Click here you don't have security answer</a>
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
                 <div class="span2">
                	Security Question
                </div>
                <div class="span4">
                 <div class="control-group">
            <div class="controls">
              <select id="select01" name="sec_q" class="span4">
                <option>Choose Question</option>
                <option>What was your childhood nickname</option>
                <option>What school did you attend for sixth grade</option>
                <option>What is the name of a college you applied to but didn't attend</option>
                <option>What was your childhood phone number</option>
                <option>What is your library card number</option>
              </select>
            </div>
          </div>
          </div>
 <!-- dsgf-->
 <div class="span2">
                	Security Answer
                </div>
                <div class="span4">
                	<input type="text" name="sec_a" class="span4" />
                </div>
                        <div class="span2">
                	New Password
                </div>
                <div class="span4">
                	<input type="password" name="pass1"  class="span4" />
                </div>
                <div class="span2">
                	Re Password
                </div>
                <div class="span4">
                	<input type="password" name="pass2"  class="span4" />
                </div>

               </div>
<div class="control-group error">
            <label class="control-label" for="inputError"><?php echo $ERROR;?></label>
          </div>
                <div class="control-group success">
            <label class="control-label" for="inputSuccess"><?php echo $success;?><a href="index.php">Go Back to Login</a></label>
          </div>
               <div class="modal-footer">
    		<input type="submit" value="Submit" name="submit" class="btn btn-success" />
	    </div>
        </form>
        </div>
</div>
</body>
</html>
