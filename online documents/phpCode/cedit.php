<?php
ob_start();
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
exit();
}
error_reporting(0);
$username=$_SESSION['username'];
$cusername=$_SESSION['cusername'];

require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
$c=mysql_query("select COUNT(client_name) from mydocs where doctor_name='$cusernmae'")or die(mysql_error());
$counter=mysql_fetch_array($c);
$count=$counter[0]+1;




$p=$_REQUEST['page'];

$page=unhack($p);

$open=mysql_query("select * from mydocs where docs_id='$page' ")or die(mysql_error(). "Error :p");
$edit=mysql_fetch_array($open);
$docs_id=$edit['docs_id'];
	$img=$edit['img'];
	$file_name=$edit['img_name'];
	$details=$edit['details'];
	$date=$edit['doc_date'];
	$client_phone=$edit['client_phone'];
	echo '<br/>';

	//echo '<form method="post" enctype="multipart/form-data">




?>




                 <div class="modal" id="myModal" area-hidden="true">
	<div class="modal-header">
    	<h3>Edit content <?php echo '<a style="float:right" href="index.php" />
		<img src="img/backbtn.png" title="Go Back">Go Back</a>';?>	</h3>
    </div>
    <div class="modal-body">

    	<form method="post" enctype="multipart/form-data">

        	<label>File Name</label>
           <?php echo '<input class="span4" type="text" name="fname" value="'.$file_name.'">';?><br />
        	<label>Email</label>
            <?php echo  '<input class="span4" type="text" value="'.$details.'" name="details1">';?><br />
        	<label>Date</label>
           <?php echo '<input class="span4" type="text" value="'.$date.'" name="date1">';?><br />
        	<label>Phone No</label>
           <?php echo '<input class="span4" type="text" value="'.$client_phone.'" name="client_phone1">';?><br />
                  <input type="checkbox" name="chk" class="checkbox " />
                  <?php 	echo '<a href="'.$img.'"><img src="'.$img.'_thumb"  width="100" height="100"
				 title="edit image"/></a>';?> <input type="file"  id="myfile" name="myfile"  class="span3"/>

        </div>

    <div class="modal-footer">
    		 <input type="submit" name="update" value="update" class="btn btn-success">

	    </div>
</form>
</div>

<?php
	if (isset($_POST['update'])){


	if (!empty($_POST['chk'])){
	$fname=unhack($_POST['fname']);
	$details1=unhack($_POST['details1']);
	$date1=unhack($_POST['date1']);
	$client_phone1=unhack($_POST['client_phone1']);


	//Properties of the uploaded file
	$name=$_FILES['myfile']['name'];
	$type=$_FILES['myfile']['type'];
	$size=$_FILES['myfile']['size'];
	$tmp_name=$_FILES['myfile']['tmp_name'];
	$error=$_FILES['myfile']['error'];
	$destination="mydocs/clients/$cusername/$page";
//remove old file
	$get=mysql_query("select img from mydocs where docs_id='$page'");
	$fimg=mysql_fetch_array($get);
	$rm=$fimg[0];
	unlink($rm);


	move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;
mysql_query("update mydocs set img='$saved' , img_name='$fname', details='$details1' , doc_date='$date1', client_phone='$client_phone1' where docs_id='$page' ")or die(mysql_error());
mysql_query("update client_login set no_of_upload='$count' where username='$cusername' ");
header('location: index.php');
	}
	else
	{
	$fname=$_POST['fname'];
	$details1=$_POST['details1'];
	$date1=$_POST['date1'];
	$client_phone1=unhack($_POST['client_phone1']);
	$ffname=unhack($fname);
	$ddetails1=unhack($details1);
	$ddate1=unhack($date1);

mysql_query("update mydocs set  img_name='$ffname', details='$ddetails1' , doc_date='$ddate1',client_phone='$client_phone1' where docs_id='$page' ")or die(mysql_error());
mysql_query("update client_login set no_of_upload='$count' where username='$details1' ");
header('location: index.php');
	}

}

	?>
	<!--</div>
    </div>-->

