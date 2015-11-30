<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/getcat.js"></script>
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
error_reporting(0);
session_start();
require 'database.php';
require 'varfilter.php';
require 'functions/sam_img_lib.php';
if(empty($_SESSION['cusername']))
{
header('location:index.php');
}
require 'clientheadwithsearch.php';



date_default_timezone_set('Asia/Kolkata');
$todayis= date('m/d/Y');



function convertDate($date) {
	$date = preg_replace('/\D/','/',$date);
	return date('Y-m-d',strtotime($date));
}

//print convertDate($todayis); //prints 1996-11-05

?>


<?php
$cusernmae=$_SESSION['cusername'];
$cod=$_SESSION['con_id'];

$c=mysql_query("select no_of_upload from client_login where username='$cusernmae'")or die(mysql_error());
$counter=mysql_fetch_array($c);
$counting=$counter[0];
$count=$counter[0]+1;
$max=200;
?>
<div class="container">
[My Health Records]
	<div class="hero-unit" style="margin:0px; padding:10px 42px;width: 905px; text-align:left">
    	<div class="row">
            <div class="span7">Welcome <?php echo $cusernmae; ?><br/>
                You have <?php echo $left=$max-$counting;?> uploads left
            </div>
                <div class="span4 text-right">
                <span>
                    <form  style="width: 330px;" method="post" action="clientsearch.php" class="" style="">
                            <input type="text" placeholder="Enter doctor name" name="srch_txt" class="input-medium search-query">
                            <button type="submit" name="srch" class="btn btn-success">Search</button>
                      </form>
                      </span>
                      </div>
          </div>

    </div>
            <div style="clear:both; margin:10px 0px"></div>





            <!--marketing area-->
            <div class="hero-unit h_top">
            	<div class="row" style="margin-left: 145px;">
            	    <div class="span2"><h5>Doctor Name</h5></div>
                    <div class="span2"><h5>Category</h5></div>
                    
                    <div class="span2"><h5>Date</h5></div>
                    <div class="span3"><h5>Upload</h5>(Max limit 5 photos at once)</div>
                  </div>
              		<div class="row" style="margin-left: 142px;">

              		<form method="post" autocomplete="off" enctype="multipart/form-data">

      				<div class="span2"><input type="text"  name="name" class="span2" /></div>
                    <div class="span2"><input type="text" id="cms1" onKeyUp="lookup_cms(this.value,this.id);" value="Prescription" name="email" class="span2" /></div>
                  
                    <div class="span2">
                    <input type="text" id="datepicker" name="date" class="span2" value="<?php echo $todayis; ?>" />
                    </div>
                    <div class="span2"><input type="file"  multiple="multiple" id="myfile" name="myfile[]"  class=" span2"/></div>
                    <div class="span1">
                    <input type="submit" name="upload" value="upload" style="margin-left: 61px;" class="btn btn-success">
                    </form>
                    </div>

  				</div>
  				<div  id="suggestions_cus" style="display:none; fontsize:5px;margin-left:501px;">
                  <ul id="autoSuggestionsList_cus" style="color:rgb(60, 16, 199);margin-left: -212px;border:1px solid black;width: 227px;" onclick=getsrch()>
                  </ul>
                </div>
 

		<div style="clear:both; margin:10px 0px"></div>







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



	 $n=$_FILES['myfile'];
	 $c= count($n);
$thumbnail=0;
$i=0;
if (file_exists(file_exists("mydocs/clients/".$cusernmae)))
{
$increement=$d_id+1;
	// $new_name = "img.$increement";
	// $detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/clients/$cusernmae/".$increement);
$destination="mydocs/clients/$cusernmae/$increement";


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
	




mysql_query("insert into linked_data 
(`id`,`user_id`,`location`,`curent_folder`,`cat`)

VALUES('NULL','$cusernmae','$saved','$destination','$email')")or die(mysql_error()."E122");


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
	(`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`,`cod`,`cat`)
	 VALUES (NULL, '$thumbnail', '$destination', '$imgname', '$cusernmae', '$imgdate', '$imgname', '$cusernmae', '$phone','$cod','$email')"
            )or die(mysql_error()."E22878798");



$noc=$counting+$i;
//mysql_query("insert into mydocs VALUES('','$saved','$imgname','$email','$imgdate','','$cusernmae','$phone')")or die(mysql_error());
mysql_query("update client_login set no_of_upload='$noc' where username='$cusernmae' ")or die(mysql_error()." Line 124");




//echo '<h3 style="text-align:center;"> successfuly Uploaded To Server in in if mode</h3>';
echo '<script>alert("Your file has been successfully uploaded to the server")</script>';

}

else
	{
	////////////////////SuperScriptStart//////////////////////////////////////
$thumbnail=0;
$i=0;
$increement=$d_id+1;
	$new_name = "img.$increement";
	$detail      =  "Detail.$increement";
date_default_timezone_get('asia/kolkata');
$date= date("Y-m-d");
mkdir("mydocs/clients/".$cusernmae);
mkdir("mydocs/clients/$cusernmae/".$increement);
$destination="mydocs/clients/$cusernmae/$increement";



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

mysql_query("insert into linked_data 
(`id`,`user_id`,`location`,`curent_folder`,`cat`)

VALUES('NULL','$cusernmae','$saved','$destination','$email')")or die(mysql_error()."E123");

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
	(`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`,`cod`,`cat`)
	 VALUES (NULL, '$thumbnail', '$destination', '$imgname', '$cusernmae', '$imgdate', '$imgname', '$cusernmae', '$phone','$cod','$email')"
            )or die(mysql_error()."E22878798");
$noc=$counting+$i;

mysql_query("update client_login set no_of_upload='$noc' where username='$cusernmae' ");


//echo '<h3>Your file is successfully Uploaded To the Server im in else mode</h3>';

echo '<script>alert("Your file has been successfully uploaded to the server")</script>';

///////////////////////EndSuperScript///////////////////////////////////
}
	





///////////////////////EndSuperScript///////////////////////////////////
}



/////////////////////////////////END UPLOADER/////////////////////////
?>
<?php
if ($count>$max)
{
	echo "You do not upload document more then 200";
}
?>

<div class="hero-unit h_top r_b">
<div class="row">
	<div class="span2"><strong>Image</strong></div>
    <div class="span2"><strong>Doctor Name</strong></div>
    <div class="span2 wrapword"><strong>Category</strong></div>

    <div class="span2"><strong>Date</strong></div>
    
    <div class="span2"style=" text-align:right"><strong>Share On</strong></div>
</div>
</div>
<?php
if(!empty($_REQUEST['f']))
{
$caty=$_REQUEST['f'];






	$tbl_name="";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;



// $qwerty=mysql_query("select * from mydocs where client_name='$cusernmae' AND cat='$caty' order by docs_id DESC ")or die(mysql_error());

$qwerty=mysql_query("select * from mydocs where client_name='$cusernmae' OR details='$cusernmae' AND cat='$caty' order by docs_id DESC ")or die(mysql_error());






	$query = "SELECT COUNT(*) as num FROM mydocs where client_name='$cusernmae' OR details='$cusernmae' AND cat='$caty' ";
	// $query = "SELECT COUNT(*) as num FROM mydocs where client_name='$cusernmae' AND cat='$caty' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "clienthome.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	// $sql = "select * from mydocs where client_name='$cusernmae' AND cat='$caty' order by docs_id DESC LIMIT $start, $limit";
	$sql = "select * from mydocs where client_name='$cusernmae' OR details='$cusernmae' AND cat='$caty' order by docs_id DESC LIMIT $start, $limit";
	$result = mysql_query($sql)or die(mysql_error()."Hyper14");
	
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









while($cdata=mysql_fetch_array($result))
{

?>
<!-- <br><br><br><br><br><br> -->
<div class="row" style="margin-left:0px;<?php if($rtyo%2==0) { ?> background:#CEFCCB; <?php }else { ?> background:#eff; <?php }?>">
<?php

$docs_id=$cdata['docs_id'];
	$img=$cdata['img'];
	$file_name=$cdata['img_name'];
	$details=$cdata['details'];
	$date=$cdata['doc_date'];
	$cat=$cdata['cat'];
	$doctor_name=$cdata['doctor_name'];
	$client_phone=$cdata['client_phone'];
	$cf=$cdata['current_folder'];
	$link="http://entspecialistnoida.com/docs/$img";
?>

	<div class="span2"><?php echo ' <a href="images.php?i='.$img.'&f='.$cf.'"><img src="'.$img.'" /></a>';?>
  	 				 
  	 				 </div>
                    <div class="span2"><?php 


$crpf=mysql_query("SELECT COUNT(`curent_folder`) FROM `linked_data` WHERE `curent_folder`='$cf' AND cat='$caty'")or die(mysql_error());
$uiv=mysql_fetch_row($crpf);
$tncf=$uiv[0];

                    //echo '<a href="cedit.php?page='.$docs_id.'">'.$file_name.'<br></a>';

                    ?>
                     				 
  	 				     <br>
        <?php
      $crpf2=mysql_query("SELECT * FROM `linked_data` WHERE `curent_folder`='$cf' AND cat='$caty'")or die(mysql_error());  
        $x=1;
        while($ftching=mysql_fetch_array($crpf2))
        {
        ?>
        <a href="img2.php?loc=<?php echo $ftching['location'];?>"><?php echo $x;?></a>
        <?php
$x++;
        }
        
        ?>
  	
                    
                    
                    </div>
                    <div class="span2" style="margin-left: -140px;"><?php echo $doctor_name;?></div>
                    <div class="span2"><?php echo $cat;?></div>
                    <div class="span2"><?php echo $date;?></div>
                  <div class="span1"><?php echo $client_phone;?></div>
                  <div class="span2" style=" text-align:right">
				  <div class="span2"><a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $link;?> "><img src="img/Facebook-icon.png" height="25" width="25"  title="Facebook"></a> <a href="http://twitter.com/share?<?php echo $link;?>"><img src="img/Twitter-icon.png" height="25" width="25" title="TWitter"></a> <a href="https://plus.google.com/share?url=<?php echo $link?>"><img src="img/GooglePlus-icon.png" height="25" width="25"  title="Google+"></a>
                 

        <a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>
        
        <!--&nbsp;&nbsp;<a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>-->
<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="js/whatsapp-button.js";h.appendChild(s);}</script>


                  </div>

<?php echo '       <a href="del.php?page='.$docs_id.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <img style="margin-top: -27px;float: right;margin-right: -59px;" src="img/no.png" height="28" width="28" title="Delete" ></a>';?>




      <?php
	   echo'</div>';
	   echo'<hr>';
	   echo "<br><br><br><br>";
	  }
















}
else
{
?>


<?php



	$tbl_name="";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;



// $qwerty=mysql_query("select * from mydocs where client_name='$cusernmae' order by docs_id DESC ")or die(mysql_error());


$qwerty=mysql_query("select * from mydocs where client_name='$cusernmae' OR details='$cusernmae' order by docs_id DESC ")or die(mysql_error());







	$query = "SELECT COUNT(*) as num FROM mydocs where client_name='$cusernmae' OR details='$cusernmae'";
	// $query = "SELECT COUNT(*) as num FROM mydocs where client_name='$cusernmae'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "clienthome.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	// $sql = "select * from mydocs where client_name='$cusernmae' order by docs_id DESC LIMIT $start, $limit";
	$sql = "select * from mydocs where client_name='$cusernmae' OR details='$cusernmae' order by docs_id DESC LIMIT $start, $limit";
	$result = mysql_query($sql)or die(mysql_error()."Hyper14");
	
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








$rtyo=0;
while($cdata=mysql_fetch_array($result))
{

?>
<!--dlddldl-->
<div class="row" <?php if($rtyo%2!=0) { ?> style="margin-left:0px;background:#CEFCCB;" <?php }else { ?> style="margin-left:0px;background:#eff;" <?php }?>>
<?php

$docs_id=$cdata['docs_id'];
	$img=$cdata['img'];
	$file_name=$cdata['img_name'];
	$details=$cdata['details'];
	$date=$cdata['doc_date'];
	$doctor_name=$cdata['doctor_name'];
	$cat=$cdata['cat'];
	$client_phone=$cdata['client_phone'];
		$cf=$cdata['current_folder'];
	$link="http://entspecialistnoida.com/docs/$img";
?>

	<div class="span2"><?php echo ' <a href="images.php?i='.$img.'&f='.$cf.'"><img src="'.$img.'" /></a>';?>
  	 				 
  	 				 </div>
                    <div class="span2"><?php 


$crpf=mysql_query("SELECT COUNT(`curent_folder`) FROM `linked_data` WHERE `curent_folder`='$cf'")or die(mysql_error());
$uiv=mysql_fetch_row($crpf);
$tncf=$uiv[0];

                    //echo '<a href="cedit.php?page='.$docs_id.'">'.$file_name.'<br></a>';

                    ?>
                     				 
  	 				     <br>
        <?php
      $crpf2=mysql_query("SELECT * FROM `linked_data` WHERE `curent_folder`='$cf'")or die(mysql_error());  
        $x=1;
        while($ftching=mysql_fetch_array($crpf2))
        {
        ?>
        <a href="img2.php?loc=<?php echo $ftching['location'];?>"><?php echo $x;?></a>
        <!-- <p><?php echo $doctor_name; ?></p> -->

        <?php
$x++;
        }
        
        ?>
  	
                    
                    
                    </div>
                    <div class="span2" style="margin-left: -140px;"><?php echo $doctor_name;?></div>
                    <div class="span2"><?php echo $cat;?></div>
                    <div class="span2"><?php echo $date;?></div>
                  <div class="span1"><?php echo $client_phone;?></div>
                  <div class="span2" style=" text-align:right">
				  <div class="span2"><a href="https://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo $link;?> "><img src="img/Facebook-icon.png" height="25" width="25"  title="Facebook"></a> <a href="http://twitter.com/share?<?php echo $link;?>"><img src="img/Twitter-icon.png" height="25" width="25" title="TWitter"></a> <a href="https://plus.google.com/share?url=<?php echo $link?>"><img src="img/GooglePlus-icon.png" height="25" width="25"  title="Google+"></a>
                 

        <a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>
        
        <!--&nbsp;&nbsp;<a href="whatsapp://send" data-text="My Prescription:" data-href="<?php echo $link; ?>" class="wa_btn wa_btn_s" ><img src="img/whatsapp-icon.png" width="28px" height="100px"></a>-->
<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="js/whatsapp-button.js";h.appendChild(s);}</script>


                  </div>

<?php echo '       <a href="del.php?page='.$docs_id.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <img style="margin-top: -27px;float: right;margin-right: -59px;" src="img/no.png" height="28" width="28" title="Delete" ></a>';?>




      <?php
	   echo'</div>';
	   echo'<hr>';
	   echo '<br><br><br><br>';
	  $rtyo++;
	  }
	 
	  }
	  ?>

<center>
<?=$pagination?>
</center>

</div>
<!--<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>-->
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
