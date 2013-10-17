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
require 'headwithsearch.php';
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
$getfiles=mysql_query("select * from tmp_table ORDER BY  id DESC")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");
while ($file=mysql_fetch_array($getfiles))
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


  <!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->
  <?php
  $getfiles=mysql_query("select * from doctor_detail ORDER BY  id DESC")or die(mysql_error(). "Error we are not get files from server check line no. 4 index.php ");
while ($file=mysql_fetch_array($getfiles))
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
 echo '<img src="img/clear-256.png" height="38" width="55">';
  }?>
        </div>
        <div class="span1"><?php echo '<a href="addel3.php?page='.$docs_id.'&s='.$status.'"><img src="img/no.png" height="38" width="55" ></a>';?>


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
