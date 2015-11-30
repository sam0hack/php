<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showButtonPanel: true
    });
  });
  </script> 


<?php


ob_start();
//error_reporting(0);
session_start();
if(empty($_SESSION['username']))
{
header('location:index.php');
}
?>
<?php

date_default_timezone_set('Asia/Kolkata');
$todayis= date('m/d/Y');



function convertDate($date) {
	$date = preg_replace('/\D/','/',$date);
	return date('Y-m-d',strtotime($date));
}

//print convertDate($todayis); //prints 1996-11-05








$cod=$_SESSION['con_id'];
require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
require 'functions/sam_img_lib.php';

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
        $cat=unhack($_POST['cat']);
//$imgdate;
        
        $imgdate=convertDate($imgdate);


$get_prev_id=mysql_query("select MAX(docs_id) from mydocs")or die (mysql_error(). " Prev id not fetched");
	$docs_id=mysql_fetch_array($get_prev_id);
	$d_id=$docs_id[0];
	//Properties of the uploaded file

	 $n=$_FILES['myfile'];
	 $c= count($n);
$thumbnail=0;
if (file_exists("mydocs/".$username))
{
$increement=$d_id+1;
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/$username/".$increement);
$destination="mydocs/$username/$increement";



for ($i=0; $i <$c ; $i++) { 


	$name=$_FILES['myfile']['name'][$i];
	//$nam=isimg($name);
	$type=$_FILES['myfile']['type'][$i];
	$siz=$_FILES['myfile']['size'][$i];
	//$size=imgsize($siz);

	$tmp_name=$_FILES['myfile']['tmp_name'][$i];
	$error=$_FILES['myfile']['error'][$i];
	//Validate must upload file and not empty receipt no and patient name
	if($error > 0 )
	{
		echo "<font color='red'><h3>Please Choose file first</h3></font>";
	}
// 	if ($size==FALSE)
// 	{
// 		echo "Your Image is Grater then 5 mb Please upload image less then 5 mb ";
// 	}
// if ($nam==FALSE)
// 	{
// 		echo "You can only upload images";
// 	}

	//Check there is reciept exists OR not
// elseif (file_exists("mydocs/".$username))
// {
	////////////////////SuperScriptStart//////////////////////////////////////
	
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";



move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


// echo $c;
// echo $i;

if (!empty($_FILES['myfile']['name'][$i])) {
	


mysql_query("insert into linked_data VALUES('NULL','$username','$saved','$destination','$cat')")or die(mysql_error()."E559ERD");


$target_file = "$saved";
$resized_file = $saved."_resized";
$wmax = 300;
$hmax = 300;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

$target_file = $saved."_resized";
$thumbnail = $saved."_thumb";
$wthumb = 150;
$hthumb = 150;
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
}
else
{

}

}

//mysql_query("insert into mydocs VALUES('NULL','$saved','$imgname','$destination','$email','$imgdate','$username','NULL','$phone')")or die(mysql_error()."E123");

//echo $thumbnail;
mysql_query("INSERT INTO `mydocs` 
	(`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`,`cod`,`cat`)
	 VALUES (NULL, '$thumbnail', '$destination', '$imgname', '$email', '$imgdate', '$username', '', '$phone','$cod','$cat')"
            )or die(mysql_error()."E22878798");






mysql_query("update doctor_login set no_of_upload='$count' where username='$username' ");





echo '<h3 style="text-align:center;"> successfuly Uploaded To Server in in if mode</h3>';

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
$thumbnail=0;

for ($i=0; $i <$c ; $i++) { 


	$name=$_FILES['myfile']['name'][$i];
	$nam=isimg($name);
	$type=$_FILES['myfile']['type'][$i];
	$siz=$_FILES['myfile']['size'][$i];
	$size=imgsize($siz);

	$tmp_name=$_FILES['myfile']['tmp_name'][$i];
	$error=$_FILES['myfile']['error'][$i];


if (!empty($_FILES['myfile']['name'][$i])) {
	
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;

mysql_query("insert into linked_data VALUES('NULL','$username','$saved','$destination','')")or die(mysql_error()."E123444");


$target_file = "$saved";
$resized_file = $saved."_resized";

$wmax = 300;
$hmax = 300;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);


$target_file = $saved."_resized";
$thumbnail = $saved."_thumb";
$wthumb = 150;
$hthumb = 150;
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
}
else
{

}



}


mysql_query("INSERT INTO `mydocs` 
	(`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`,`cod`,'cat')
	 VALUES (NULL, '$thumbnail', '$destination', '$imgname', '$email', '$imgdate', '$username', '', '$phone','$cod','$cat')"
            )or die(mysql_error()."E22");


mysql_query("update doctor_login set no_of_upload='$count' where username='$username' ");

echo '<h3>Your file is successfully Uploaded To the Server im in else mode</h3>';
///////////////////////EndSuperScript///////////////////////////////////
}

}
if(isset($_POST['ehr']))
{

    $myfile=$_POST['myfile'];


    $imgname=unhack($_POST['name']);
	$email=unhack($_POST['email']);
	$imgdate=unhack($_POST['date']);
	$phone=unhack($_POST['phone']);
        $cat=unhack($_POST['cat']);
        $imgdate=convertDate($imgdate);
	$get_prev_id=mysql_query("select MAX(docs_id) from mydocs")or die (mysql_error(). " Prev id not fetched");
	$docs_id=mysql_fetch_array($get_prev_id);
	$d_id=$docs_id[0];
	//Properties of the uploaded file

	 $n=$_FILES['myfile'];
	 $c= count($n);
$thumbnail=0;
if (file_exists("mydocs/".$username))
{
$increement=$d_id+1;
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/$username/".$increement);
$destination="mydocs/$username/$increement";



for ($i=0; $i <$c ; $i++) { 


	$name=$_FILES['myfile']['name'][$i];
	//$nam=isimg($name);
	$type=$_FILES['myfile']['type'][$i];
	$siz=$_FILES['myfile']['size'][$i];
	//$size=imgsize($siz);

	$tmp_name=$_FILES['myfile']['tmp_name'][$i];
	$error=$_FILES['myfile']['error'][$i];
	//Validate must upload file and not empty receipt no and patient name
	if($error > 0 )
	{
		echo "<font color='red'><h3>Please Choose file first</h3></font>";
	}
// 	if ($size==FALSE)
// 	{
// 		echo "Your Image is Grater then 5 mb Please upload image less then 5 mb ";
// 	}
// if ($nam==FALSE)
// 	{
// 		echo "You can only upload images";
// 	}

	//Check there is reciept exists OR not
// elseif (file_exists("mydocs/".$username))
// {
	////////////////////SuperScriptStart//////////////////////////////////////
	
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";



move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;


// echo $c;
// echo $i;

if (!empty($_FILES['myfile']['name'][$i])) {
	


mysql_query("insert into linked_data VALUES('NULL','$username','$saved','$destination','$cat')")or die(mysql_error()."E559ERD");


$target_file = "$saved";
$resized_file = $saved."_resized";
$wmax = 300;
$hmax = 300;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

$target_file = $saved."_resized";
$thumbnail = $saved."_thumb";
$wthumb = 150;
$hthumb = 150;
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
}
else
{

}

}

//mysql_query("insert into mydocs VALUES('NULL','$saved','$imgname','$destination','$email','$imgdate','$username','NULL','$phone')")or die(mysql_error()."E123");

//echo $thumbnail;
mysql_query("INSERT INTO `mydocs` 
	(`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`,`cod`,`cat`)
	 VALUES (NULL, '$thumbnail', '$destination', '$imgname', '$email', '$imgdate', '$username', '', '$phone','$cod','$cat')"
            )or die(mysql_error()."E22878798");






mysql_query("update doctor_login set no_of_upload='$count' where username='$username' ");





//echo '<h3 style="text-align:center;"> successfuly Uploaded To Server in in if mode</h3>';
header('location:../wehr_new/Clinical_Page.php');
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
$thumbnail=0;

for ($i=0; $i <$c ; $i++) { 


	$name=$_FILES['myfile']['name'][$i];
	$nam=isimg($name);
	$type=$_FILES['myfile']['type'][$i];
	$siz=$_FILES['myfile']['size'][$i];
	$size=imgsize($siz);

	$tmp_name=$_FILES['myfile']['tmp_name'][$i];
	$error=$_FILES['myfile']['error'][$i];


if (!empty($_FILES['myfile']['name'][$i])) {
	
move_uploaded_file($tmp_name,"$destination/".$name);
$saved= "$destination/".$name;

mysql_query("insert into linked_data VALUES('NULL','$username','$saved','$destination','')")or die(mysql_error()."E123444");


$target_file = "$saved";
$resized_file = $saved."_resized";

$wmax = 300;
$hmax = 300;
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);


$target_file = $saved."_resized";
$thumbnail = $saved."_thumb";
$wthumb = 150;
$hthumb = 150;
ak_img_thumb($target_file, $thumbnail, $wthumb, $hthumb, $fileExt);
}
else
{

}



}


mysql_query("INSERT INTO `mydocs` 
	(`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`,`cod`,'cat')
	 VALUES (NULL, '$thumbnail', '$destination', '$imgname', '$email', '$imgdate', '$username', '', '$phone','$cod','$cat')"
            )or die(mysql_error()."E22");


mysql_query("update doctor_login set no_of_upload='$count' where username='$username' ");

echo '<h3>Your file is successfully Uploaded To the Server im in else mode</h3>';
///////////////////////EndSuperScript///////////////////////////////////
header('location:../wehr_new/Clinical_Page.php');
}
//header('location:../wehr_new/Clinical_Page.php');
}

?>
<div class="container">
 <a class="brand" style="margin-right: 45px;margin-left: -141px;" href="index.php">[My Health Records]</a>
	<div class="hero-unit" style="margin:0px; width:991px;padding:10px 0px; text-align:left">
    	<div class="span7">Welcome <?php echo $username; ?>
    	<br><a href="http://entnoida.com">My Website</a>
        <a style="margin-left:20px;"href="http://entnoida.com/webclinic">My Clinic</a>
    	
    	</div>
        	<div class="span4 text-right">
                <form method="post" action="search.php" class="" style="">
                        <input type="text" name="srch_txt" class="input-medium search-query" style="height: 34px;width: 220px;">
                        <button type="submit"  style="background:#034482 !important;" name="srch" class="btn btn-success">Search</button>
                  </form>
                  </div>
                  <div style="clear:both"></div>
			</div>



  <div style="clear:both; margin:10px 0px;"></div>


            <!--marketing area-->
            <div class="hero-unit h_top">
            	<div class="row">
            	    <div class="span2" style="margin-left:33px; width:110px;"><h5>Name</h5></div>
                    <div class="span2" style="width:110px;"><h5>Email</h5></div>
                    <div class="span2" style="width:110px;"><h5>Phone</h5></div>
                    <div class="span2" style="width:110px;"><h5>Category</h5></div>
                   <div class="span2" style="width:110px;" ><h5>Date</h5></div>
                   <div class="span2" style="width:90px;"><h5>File</h5></div>
                    <span class="span2" style="width: 168px;"><h5 style="margin-left: 23px;">Upload Max 5 photos </h5> </span>
                  </div>
              		<div class="row">

              		<form method="post" autocomplete="off" enctype="multipart/form-data">

      				<div class="span2" style="width:110px; margin-left:28px;"><input type="text"  name="name" class="span2" /></div>
                    <div class="span2"  style="width:110px;"><input type="text" name="email" class="span2" /></div>
                    <div class="span2"  style="width:110px;"><input type="text" name="phone" class="span2" /></div>
                    <div class="span2"  style="width:110px;"><input type="text" name="cat" value="Prescription" class="span2" /></div>
                    <!--<div class="span2"><input type="date" name="date" class="span2" /></div>-->
                   <div class="span2"  style="width:110px;"><input type="text" id="datepicker" name="date" class="span2" value="<?php echo $todayis; ?>" /></div>


                    <div class="span2"  style="width:110px;"><input type="file" multiple="multiple"  id="myfile" name="myfile[]"  class=" span2"/></div>
                    <div class="span1" style="float:left; width:74px;">
                    <input type="submit" style="background:#034482 !important;" name="upload" value="upload" class="btn btn-primary"></div>
                  <div style="float:left;">
                    <input type="submit"  name="ehr" value="e-Prescription" class="btn btn-inverse">
                    </form>
                    </div>

                    <!--
                    btn-primary
                    btn-warning
                    btn-danger
                    btn-info
                    btn-inverse
                    -->
                    
                    
                    
                    </div>

             </div>
<div class="hero-unit h_top r_b" style="background:#54b4eb !important;">
<div class="row">
	<div class="span2" style="width:110px; margin-left:40px;"><strong>Image</strong></div>
    <div class="span1" style="width:90px;"><strong>Filename</strong></div>
    <div class="span2 wrapword" style="width:110px;"><strong>Email-ID</strong></div>
    <div class="span2" style="width:80px;"><strong>Phone No</strong></div>
    <div class="span2" style="width:110px;"><strong>Category</strong></div>
   <div class="span2" style="width:60px;"><strong>Date</strong></div>
    <div class="span2" style="width:110px;"><strong>Share On</strong></div>
    <div class="span1" style="width:110px;"><strong>Send mail</strong></div>
</div>
</div>
<?php
if(!empty($_REQUEST['f']))
{
$caty=$_REQUEST['f'];

	$tbl_name="";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;


$getfiles=mysql_query("select * from mydocs where doctor_name='$username' AND cat='$caty' order by docs_id DESC ")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");









	
	$query = "SELECT COUNT(*) as num FROM mydocs where doctor_name='$username' AND cat='$caty' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "doctorhome.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select * from mydocs where doctor_name='$username' AND cat='$caty' order by docs_id DESC LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= " <a href=\"$targetpage?page=$prev\"> << previous  </a>";
		else
			$pagination.=  " <span class=\"disabled\"> << previous   </span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage?page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= " <a href=\"$targetpage?page=$next\"> next >></a>";
		else
			$pagination.= " <span class=\"disabled\"> next >></span>";
		$pagination.= "</div>\n";		
	}





$alter=0;

while ($file=mysql_fetch_array($result))
{
?>

<div class="row" <?php if($alter%2==1){ ?> style="background-color:rgb(240, 242, 247); " <?php } ?>>
<?php
$docs_id=$file['docs_id'];
	$img=$file['img'];
	$cf=$file['current_folder'];
        $cat=$file['cat'];
	$file_name=$file['img_name'];
	$details=$file['details'];
	$date=$file['doc_date'];
	$client_phone=$file['client_phone'];
    $link="http://entspecialistnoida.com/docs/$img";
?>

		<div class="span2" >
<?php


$crpf=mysql_query("SELECT COUNT(`curent_folder`) FROM `linked_data` WHERE `curent_folder`='$cf'")or die(mysql_error());
$uiv=mysql_fetch_row($crpf);
$tncf=$uiv[0];

			echo '<a href="images.php?i='.$img.'&f='.$cf.'"><img src="'.$img.'"  title=""/></a>';?>
   		</div>
        <div class="span1"><?php echo '<a href="edit.php?page='.$docs_id.'&cat='.$cat.'">'.$file_name.'<br> Edit</a>';?>
        <br>
        <?php
      $crpf2=mysql_query("SELECT * FROM `linked_data` WHERE `curent_folder`='$cf'")or die(mysql_error());  
        $x=0;
        while($ftching=mysql_fetch_array($crpf2))
        {
        ?>
        <a href="img2.php?loc=<?php echo $ftching['location'];?>"><?php echo $x;?></a>
        <?php
$x++;
        }
        
        ?>
        
        </div>
       
       <div class="span2 wrapword" style="width:130px;"><?php echo $details;?></div>
        <div class="span2" style="width:90px;"><?php echo $client_phone;?></div>
      <div class="span2" style="width:57px;"><?php echo $cat;?></div>
        <div class="span2" style="width:78px; margin-left:35px;"><?php echo $date;?></div>

        <div class="span2"><a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $link;?> "><img src="img/Facebook-icon.png" height="25" width="25"  title="Facebook"></a> <a href="http://twitter.com/share?<?php echo $link;?>"><img src="img/Twitter-icon.png" height="25" width="25" title="TWitter"></a> <a href="https://plus.google.com/share?url=<?php echo $link?>"><img src="img/GooglePlus-icon.png" height="25" width="25"  title="Google+"></a>
&nbsp;&nbsp;


        <a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>
        
        <!--&nbsp;&nbsp;<a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>-->
<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="js/whatsapp-button.js";h.appendChild(s);}</script>

        </div>
        <div class="span1" ><?php  if (filter_var($details, FILTER_VALIDATE_EMAIL)) {
$sql=mysql_query("select con_id from client_login where username='$details' ");

if (mysql_num_rows($sql)==1) {

 echo '<a href="Emailer.php?email='.$details.'">Re-send</a>&nbsp;';
  
}
else
{

 echo '<a href="Emailer.php?email='.$details.'">Send</a>&nbsp;';
  
}

  } 
  echo '<a href="del1.php?page='.$docs_id.'&d='.$details.'"><img src="img/no.png" height="20" width="20" title="Delete" ></a>';?>



  </div>
 
  <?php
  echo'</div>';
    echo'<hr>';
  
  $alter++;
  }

}else
{




	$tbl_name="";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;


$getfiles=mysql_query("select * from mydocs where doctor_name='$username' order by docs_id DESC ")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");









	
	$query = "SELECT COUNT(*) as num FROM mydocs where doctor_name='$username'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "doctorhome.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "select * from mydocs where doctor_name='$username' order by docs_id DESC LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= " <a href=\"$targetpage?page=$prev\"> << previous  </a>";
		else
			$pagination.=  " <span class=\"disabled\"> << previous   </span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\"> 1 </a>";
				$pagination.= "<a href=\"$targetpage?page=2\"> 2 </a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= " <a href=\"$targetpage?page=$next\"> next >></a>";
		else
			$pagination.= " <span class=\"disabled\"> next >></span>";
		$pagination.= "</div>\n";		
	}





$alter=0;

while ($file=mysql_fetch_array($result))
{
?>

<div class="row" <?php if($alter%2==1){ ?> style="background-color:rgb(240, 242, 247);  width:991px; margin-left:0px;" <?php } ?>>
<?php
$docs_id=$file['docs_id'];
	$img=$file['img'];
	$cf=$file['current_folder'];
        $cat=$file['cat'];
	$file_name=$file['img_name'];
	$details=$file['details'];
	$date=$file['doc_date'];
	$client_phone=$file['client_phone'];
    $link="http://entspecialistnoida.com/docs/$img";
?>

		<div class="span2" >
<?php


$crpf=mysql_query("SELECT COUNT(`curent_folder`) FROM `linked_data` WHERE `curent_folder`='$cf'")or die(mysql_error());
$uiv=mysql_fetch_row($crpf);
$tncf=$uiv[0];

			echo '<a  style="margin-left:-20px;"href="images.php?i='.$img.'&f='.$cf.'"><img src="'.$img.'"  title=""/></a>';?>
   		</div>
        <div class="span1"><?php echo '<a href="edit.php?page='.$docs_id.'&cat='.$cat.'">'.$file_name.'<br>Edit</a>';?>
         <br>
        <?php
      $crpf2=mysql_query("SELECT * FROM `linked_data` WHERE `curent_folder`='$cf'")or die(mysql_error());  
        $x=0;
        while($ftching=mysql_fetch_array($crpf2))
        {
        ?>
        <a href="img2.php?loc=<?php echo $ftching['location'];?>"><?php echo $x;?></a>
        <?php
$x++;
        }
        
        ?>
       
        
        </div>
        <div class="span2 wrapword" style="width:130px;"><?php echo $details;?></div>
        <div class="span2" style="width:90px;"><?php echo $client_phone;?></div>
      <div class="span2" style="width:57px;"><?php echo $cat;?></div>
        <div class="span2" style="width:78px; margin-left:35px;"><?php echo $date;?></div>

        <div class="span2"><a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $link;?> "><img src="img/Facebook-icon.png" height="25" width="25"  title="Facebook"></a> <a href="http://twitter.com/share?<?php echo $link;?>"><img src="img/Twitter-icon.png" height="25" width="25" title="TWitter"></a> <a href="https://plus.google.com/share?url=<?php echo $link?>"><img src="img/GooglePlus-icon.png" height="25" width="25"  title="Google+"></a>

        <a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>
        
        <!--&nbsp;&nbsp;<a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>-->
<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="js/whatsapp-button.js";h.appendChild(s);}</script>
        </div>
        <div class="span1" ><?php  if (filter_var($details, FILTER_VALIDATE_EMAIL)) {
$sql=mysql_query("select con_id from client_login where username='$details' ");

if (mysql_num_rows($sql)==1) {

 echo '<a href="Emailer.php?email='.$details.'">Re-send</a>&nbsp;';
  
}
else
{

 echo '<a href="Emailer.php?email='.$details.'">Send</a>&nbsp;';
  
}

  } 
  echo '<a href="del1.php?page='.$docs_id.'&d='.$details.'"><img src="img/no.png" height="20" width="20" title="Delete" >Delete</a>';?>



  </div>
 
  <?php
  echo'</div>';
    echo'<hr style="margin:2px;">';
  
  $alter++;
  }
}
?>
<center>
<?=$pagination?>
</center>

  </div>
  <!--<footer class="navbar modal-footer navbar-fixed-bottom">
  	<div class="container">
  		<p>Elvish health package</p>
     </div>
  </footer>-->
 <!-- <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>
