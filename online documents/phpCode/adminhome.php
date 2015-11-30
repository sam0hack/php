<?php
ob_start();
error_reporting(0);
session_start();
if(empty($_SESSION['ausername']))
{
header('location:index.php');
exit();
}
?>
<?php
require 'admin_headwithsearch.php';
require 'varfilter.php';
require 'database.php';
$username=$_SESSION['ausername'];
?>
<div class="container">
	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">
    	<div class="span7">Welcome <?php echo $username; ?></div>
        	<div class="span4 text-right">
                <form method="post" action="adminsrch.php" class="" style="">
                        <input type="text" name="srch_txt" class="input-medium search-query">
                        <button type="submit" name="srch" class="btn btn-success">Search</button>
                  </form>
                  </div>
                  <div style="clear:both"></div>
			</div>



  <div style="clear:both; margin:10px 0px"></div>


<div class="hero-unit h_top r_b">
    <div class="row">
        <div class="span2"><strong>Image</strong></div>
        <div class="span1"><strong>Name</strong></div>
        <div class="span2 wrapword"><strong>Email-ID</strong></div>
        <div class="span2"><strong>Phone No</strong></div>
        <div class="span2"><strong>Status</strong></div>
        <div class="span2"><strong>Verify</strong></div>
        <div class="span1"><strong>Delete</strong></div>
    </div>
</div>
<?php


$tbl_name="tmp_table";   //your table name
  // How many adjacent pages should be shown on each side?
  $adjacents = 3;

$getfiles=mysql_query("select * from tmp_table ORDER BY  id DESC")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");




  
  $query = "SELECT COUNT(*) as num FROM tmp_table";
  $total_pages = mysql_fetch_array(mysql_query($query));
  $total_pages = $total_pages[num];
  
  /* Setup vars for query. */
  $targetpage = "adminhome.php";   //your file name  (the name of this file)
  $limit = 5;                 //how many items to show per page
  $page = $_GET['page'];
  if($page) 
    $start = ($page - 1) * $limit;      //first item to display on this page
  else
    $start = 0;               //if no page var is given, set start to 0
  
  /* Get data. */
  $sql = "select * from tmp_table ORDER BY  id DESC LIMIT $start, $limit";
  $result = mysql_query($sql);
  
  /* Setup page vars for display. */
  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
  $prev = $page - 1;              //previous page is page - 1
  $next = $page + 1;              //next page is page + 1
  $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;            //last page minus 1
  
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
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    { 
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
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




while ($file=mysql_fetch_array($result))
{
echo'<div class="row" >';
	$docs_id=$file['id'];
	$img=$file['pic'];
	$file_name=$file['name'];
	$email=$file['email'];
	$status=$file['status'];
	$client_phone=$file['phone'];
    $link="http://localhost/$img";
    $default_pic="img/doc_img.jpg";
?>
		<div class="span2">
		<?php 	echo ' <a href="'.$default_pic.'"><img src="'.$default_pic.'" height="20"  title=""/></a>';?>
   		</div>
        <div class="span1"><?php echo '<a href="edit.php?page='.$docs_id.'">'.$file_name.'</a>';?></div>
        <div class="span2 wrapword"><?php echo $email;?></div>
        <div class="span2"><?php echo $client_phone;?></div>
        <div class="span2"><?php if ($status==0) {
        	echo '<h4><font color="red">Unverified‎</font></h4>';
        } ?></div>

        <div class="span2"><?php  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo '<a href="adminemail.php?email='.$email.'&o='.$docs_id.'"><img src="img/send_email.png" height="38" width="55"  title="EMAIL"></a>';
  }?>
        </div>
        <div class="span1"><?php echo '<a href="addel3.php?page='.$docs_id.'&s='.$status.'"><img src="img/no.png" height="38" width="55" ></a>';?>


  </div>

  <?php
  echo'</div>';
  echo'<hr>';
  }?>
<center>
<?=$pagination?>
</center>


  <!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->
  <?php
  //$tbl_name="tmp_table";   //your table name
  // How many adjacent pages should be shown on each side?
  $adjacents = 3;
  $getfiles=mysql_query("select * from doctor_detail ORDER BY  id DESC")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");


  $query = "SELECT COUNT(*) as num FROM doctor_detail";
  $total_pages = mysql_fetch_array(mysql_query($query));
  $total_pages = $total_pages[num];
  
  /* Setup vars for query. */
  $targetpage = "adminhome.php";   //your file name  (the name of this file)
  $limit = 5;                 //how many items to show per page
  $page = $_GET['page'];
  if($page) 
    $start = ($page - 1) * $limit;      //first item to display on this page
  else
    $start = 0;               //if no page var is given, set start to 0
  
  /* Get data. */
  $sql = "select * from doctor_detail ORDER BY  id DESC LIMIT $start, $limit";
  $result = mysql_query($sql);
  
  /* Setup page vars for display. */
  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
  $prev = $page - 1;              //previous page is page - 1
  $next = $page + 1;              //next page is page + 1
  $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;            //last page minus 1
  
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
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    { 
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
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





while ($file=mysql_fetch_array($result))
{
echo'<div class="row" >';
	$docs_id=$file['id'];
	$img=$file['pic'];
	$file_name=$file['name'];
	$email=$file['email'];
	$status=$file['status'];
	$client_phone=$file['phone'];
    $link="http://localhost/$img";
    $default_pic="img/doc_img.jpg";
?>
		<div class="span2">
		<?php 	echo ' <a href="'.$default_pic.'"><img src="'.$default_pic.'" height="20"  title=""/></a>';?>
   		</div>
        <div class="span1"><?php echo '<a href="edit.php?page='.$docs_id.'">'.$file_name.'</a>';?></div>
        <div class="span2 wrapword"><?php echo $email;?></div>
        <div class="span2"><?php echo $client_phone;?></div>
        <div class="span2"><?php if ($status==1) {
        	echo '<img src="img/ok.png" height="38" width="55" >';
        } ?></div>

        <div class="span2"><?php  if ($status==1) {
 echo '<img src="img/Clear-256.png" height="38" width="55">';
  }?>
        </div>
        <div class="span1"><?php echo '<a href="addel3.php?page='.$docs_id.'&s='.$status.'"><img src="img/no.png" height="38" width="55" ></a>';?>


  </div>

  <?php
  echo'</div>';
  echo'<hr>';
  }?>

<center>
<?=$pagination?>
</center>

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
