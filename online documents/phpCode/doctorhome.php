<?php
ob_start();
error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
}
?>
<?php

require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
$username=$_SESSION['username'];

$c=mysql_query("select COUNT(doctor_name) from mydocs where doctor_name='$username'")or die(mysql_error());
$counter=mysql_fetch_array($c);
$count=0;
if ($counter[0]!=0)
{
$count=$counter[0];
}
if (isset($_POST['upload']))
{
    $myfile=$_POST['myfile'];


    $imgname=unhack($_POST['name']);
	$email=unhack($_POST['email']);
	$imgdate=unhack($_POST['date']);
	$phone=unhack($_POST['phone']);



	$get_prev_id=mysql_query("select MAX(docs_id) from mydocs")or die (mysql_error(). " Prev id not fetched");
	$docs_id=mysql_fetch_array($get_prev_id);
	$d_id=$docs_id[0];
	//Properties of the uploaded file
	$name=$_FILES['myfile']['name'];
	$nam=isimg($name);
	$type=$_FILES['myfile']['type'];
	$siz=$_FILES['myfile']['size'];
	$size=imgsize($siz);

	$tmp_name=$_FILES['myfile']['tmp_name'];
	$error=$_FILES['myfile']['error'];
	//Validate must upload file and not empty receipt no and patient name
	if($error > 0 )
	{
		echo "<font color='red'><h3>Please Choose file first</h3></font>";
	}
	if ($size==FALSE)
	{
		echo "Your Image is Grater then 5 mb Please upload image less then 5 mb ";
	}
if ($nam==FALSE)
	{
		echo "You can only upload images";
	}

	//Check there is reciept exists OR not
elseif (file_exists("mydocs/".$username))
{
	////////////////////SuperScriptStart//////////////////////////////////////
	$increement=$d_id+1;
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/$username/".$increement);
$destination="mydocs/$username/$increement";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


mysql_query("insert into mydocs VALUES('','$saved','$imgname','$email','$imgdate','$username','','$phone')")or die(mysql_error());

mysql_query("update doctor_login set no_of_upload='$count' where username='$username' ");
echo '<h3 style="text-align:center;"> successfuly Uploaded To Server</h3>';

}

else
	{
	////////////////////SuperScriptStart//////////////////////////////////////
	$increement=$d_id+1;
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/".$username);
mkdir("mydocs/$username/".$increement);
$destination="mydocs/$username/$increement";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;



mysql_query("insert into mydocs VALUES('','$saved','$imgname,'$email','$imgdate','$username','','$phone')")or die(mysql_error());

mysql_query("update doctor_login set no_of_upload='$count' where username='$username' ");

echo '<h3>Your file is successfully Uploaded To the Server</h3>';
///////////////////////EndSuperScript///////////////////////////////////
}

}
?>
<div class="container">
	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">
    	<div class="span7">Welcome <?php echo $username; ?></div>
        	<div class="span4 text-right">
                <form method="post" action="search.php" class="" style="">
                        <input type="text" name="srch_txt" class="input-medium search-query">
                        <button type="submit" name="srch" class="btn btn-success">Search</button>
                  </form>
                  </div>
                  <div style="clear:both"></div>
			</div>



  <div style="clear:both; margin:10px 0px"></div>


            <!--marketing area-->
            <div class="hero-unit h_top">
            	<div class="row">
            	    <div class="span2">Name</div>
                    <div class="span2">Email</div>
                    <div class="span2">Phone</div>
                    <div class="span2">Date</div>
                    <div class="span3">Upload</div>
                  </div>
              		<div class="row">

              		<form method="post" enctype="multipart/form-data">

      				<div class="span2"><input type="text"  name="name" class="span2" /></div>
                    <div class="span2"><input type="text" name="email" class="span2" /></div>
                    <div class="span2"><input type="text" name="phone" class="span2" /></div>
                    <div class="span2"><input type="date" name="date" class="span2" /></div>
                    <div class="span2"><input type="file"  id="myfile" name="myfile"  class=" span2"/></div>
                    <div class="span1">
                    <input type="submit" name="upload" value="upload" class="btn btn-success">
                    </form>
                    </div>
  				</div>

             </div>
<div class="hero-unit h_top r_b">
<div class="row">
	<div class="span2"><strong>Image</strong></div>
    <div class="span1"><strong>Filename</strong></div>
    <div class="span2 wrapword"><strong>Email-ID</strong></div>
    <div class="span2"><strong>Phone No</strong></div>
    <div class="span2"><strong>Date</strong></div>
    <div class="span2"><strong>Share On</strong></div>
    <div class="span1"><strong>Send mail</strong></div>
</div>
</div>
<?php
$getfiles=mysql_query("select * from mydocs where doctor_name='$username' order by docs_id DESC ")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");
while ($file=mysql_fetch_array($getfiles))
{
echo'<div class="row">';
	$docs_id=$file['docs_id'];
	$img=$file['img'];
	$file_name=$file['img_name'];
	$details=$file['details'];
	$date=$file['doc_date'];
	$client_phone=$file['client_phone'];
    $link="http://localhost/$img";
?>
		<div class="span2">
		<?php 	echo ' <a href="'.$img.'"><img src="'.$img.'" height="20"  title=""/></a>';?>
   		</div>
        <div class="span1"><?php echo '<a href="edit.php?page='.$docs_id.'">'.$file_name.'</a>';?></div>
        <div class="span2 wrapword"><?php echo $details;?></div>
        <div class="span2"><?php echo $client_phone;?></div>
        <div class="span2"><?php echo $date;?></div>

        <div class="span2"><?php echo '<a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]='.$link.'"><img src="img/Facebook-Icon.png" height="25" width="25"  title="Facebook"></a> <a href="http://twitter.com/share?'.$link.'"><img src="img/twitter_icon.png" height="25" width="25" title="TWitter"></a> <a href="	 https://plus.google.com/share?url='.$link.'"><img src="img/google-Plus-icon.png" height="25" width="25"  title="Google+"></a>';?>
        </div>
        <div class="span1"><?php  if (filter_var($details, FILTER_VALIDATE_EMAIL)) {
 echo '<a href="Emailer.php?email='.$details.'"><img src="img/send_email.png" height="38" width="55"  title="EMAIL"></a>';
  } echo '<a href="del1.php?page='.$docs_id.'&d='.$details.'"><img src="img/no.png" height="20" width="20" title="Delete" ></a>';?>


  </div>

  <?php
  echo'</div>';
    echo'<hr>';
  }?>
  </div>
  <!--<footer class="navbar modal-footer navbar-fixed-bottom">
  	<div class="container">
  		<p>Elvish health package</p>
     </div>
  </footer>-->
  <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>


