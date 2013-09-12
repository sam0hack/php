<?php
ob_start();
error_reporting(0);
session_start();
require 'database.php';
require 'varfilter.php';
if(empty($_SESSION['cusername']))
{
header('location:index.php');
}
require 'headwithsearch.php';
?>


<?php
$cusernmae=$_SESSION['cusername'];
$c=mysql_query("select no_of_upload from client_login where username='$cusernmae'")or die(mysql_error());
$counter=mysql_fetch_array($c);
$counting=$counter[0];
$count=$counter[0]+1;
$max=200;
?>
<div class="container">
	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">
    	<div class="span7">Welcome <?php echo $cusernmae; ?><br/>
    	You have <?php echo $left=$max-$counting;?> uploads left

    	</div>
        	<div class="span4 text-right">
                <form method="post" action="clientsearch.php" class="" style="">
                        <input type="text" name="srch_txt" class="input-medium search-query">
                        <button type="submit" name="srch" class="btn btn-success">Search</button>
                  </form>
                  </div>
                  <div style="clear:both"></div>
			</div>



  <div style="clear:both; margin:10px 0px"></div>


            <!--marketing area-->
            <div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">
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
             	<div style="clear:both"></div>
  <div class="row" style="padding:20px">




<?php
//////////////////////////////UPLOADER/////////////////////////////////


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
elseif (file_exists("mydocs/clients/".$cusernmae))
{
	////////////////////SuperScriptStart//////////////////////////////////////
	$increement=$d_id+1;
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/clients/$cusernmae/".$increement);
$destination="mydocs/clients/$cusernmae/$increement";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


mysql_query("insert into mydocs VALUES('','$saved','$imgname','$email','$imgdate','','$cusernmae','$phone')")or die(mysql_error());
mysql_query("update client_login set no_of_upload='$count' where username='$cusernmae' ")or die(mysql_error()." Line 124");


}

else
	{
	////////////////////SuperScriptStart//////////////////////////////////////
	$increement=$d_id+1;
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/clients/".$cusernmae);
mkdir("mydocs/clients/$cusernmae/".$increement);
$destination="mydocs/clients/$cusernmae/$increement";
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


mysql_query("insert into mydocs VALUES('','$saved','$new_name','','$date','$cusernmae','')")or die(mysql_error());

mysql_query("update client_login set no_of_upload='$count' where username='$cusernmae' ");


///////////////////////EndSuperScript///////////////////////////////////
}

}

/////////////////////////////////END UPLOADER/////////////////////////
?>
<?php
if ($count>$max)
{
	echo "You do not upload document more then 200";
}
?>

<div class="row">
	<div class="span2"><strong>Image</strong></div>
    <div class="span2"><strong>Filename</strong></div>
    <div class="span2 wrapword"><strong>Email-ID</strong></div>

    <div class="span2"><strong>Date</strong></div>
    <div class="span1"><strong>Phone No</strong></div>
    <div class="span2"style=" text-align:right"><strong>Share On</strong></div>

</div>
<?php

$qwerty=mysql_query("select * from mydocs where client_name='$cusernmae' order by docs_id DESC ")or die(mysql_error());
while($cdata=mysql_fetch_array($qwerty))
{
echo'<div class="row" >';
	$docs_id=$cdata['docs_id'];
	$img=$cdata['img'];
	$file_name=$cdata['img_name'];
	$details=$cdata['details'];
	$date=$cdata['doc_date'];
	$client_phone=$cdata['client_phone'];
	$link="http://localhost/$img";
?>

	<div class="span2"><?php 	echo ' <a href="'.$img.'"><img src="'.$img.'" height="50px"/></a>';
  	 				 ?>
  	 				 </div>
                    <div class="span2"><?php echo '<a href="cedit.php?page='.$docs_id.'">'.$file_name.'</a>';?></div>
                    <div class="span2"><?php echo $details;?></div>
                    <div class="span2"><?php echo $date;?></div>
                  <div class="span1"><?php echo $client_phone;?></div>
                  <div class="span2" style=" text-align:right">
				  	<?php echo  '<a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]='.$link.'"><img src="img/Facebook-Icon.png" ></a> <a href="http://twitter.com/share?'.$link.'"><img src="img/twitter_icon.jpg" height="38" width="25"></a> <a href="	 https://plus.google.com/share?url='.$link.'"><img src="img/google-Plus-icon.png" height="34" width="25"></a>';?>
                  </div>

<?php echo '       <a href="del.php?page='.$docs_id.'">&nbsp;&nbsp;&nbsp; &nbsp;   Del</a>';?>




      <?php
	   echo'</div>';
	  }?>
</div>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
