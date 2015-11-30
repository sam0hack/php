<?php
ob_start();
//error_reporting(0);
session_start();
// if(empty($_SESSION['username']))
// {
// header('location:index.php');
// }

require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
require 'functions/sam_img_lib.php';

$username=$_SESSION['username'];
$img_path=$_REQUEST['i'];
$folder=$_REQUEST['f'];

$cate=0;
$qwe=mysql_query("select * from linked_data where curent_folder='$folder'")or die(mysql_error());

$sdf=mysql_fetch_object($qwe);
$ccd=$sdf->cat;
// if (isset($_POST['subcat'])) {

// echo $cat=$_POST['icat'];

// echo $locc=$_POST['locc'];


// //mysql_query("update linked_data set cat='$cat' where curent_folder='$locc'")or die(mysql_error());


// 	}	



?>

<!DOCTYPE html><html>
<head>
	<title>PhotoSwipe</title>
	<meta name="author" content="ilm- https://ilmtechlab.com" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
	<link href="css/nstyle/styles.css" type="text/css" rel="stylesheet" />
	
	<link href="1.0.11/photoswipe.css" type="text/css" rel="stylesheet" />
	
	<script type="text/javascript" src="1.0.11/lib/simple-inheritance.min.js"></script>
	<script type="text/javascript" src="1.0.11/code-photoswipe-1.0.11.min.js"></script>
	
	
	<script type="text/javascript">
		
		// Set up PhotoSwipe with all anchor tags in the Gallery container 
		document.addEventListener('DOMContentLoaded', function(){
			
			Code.photoSwipe('a', '#Gallery');
			
		}, false);
		
		
		
	</script>
	
</head>
<body>

  <div id="Header">

</div>

<div id="MainContent">

	<div class="page-content">
<h2>Current category is 	 
<font size="4px" color="purple"> 
<?php
echo $ccd;

?>
</font>
	</h2>	
	</div>
	<form action="addcat.php">
	Add Or Change category <input name="icat" required  type="text">
<input type="hidden" name="folder" value="<?php echo $folder; ?>">
	<input type="submit" name="subcat" style="height:50px; width:70px" class="btn btn-primary" value="Add"> 
	</form>
	<div id="Gallery">
	

		<div class="gallery-row">
	
			
<?php
$qwe5=mysql_query("select * from linked_data where curent_folder='$folder'")or die(mysql_error());
			while ($ary=mysql_fetch_array($qwe5)) {
$loc=$ary['location'];
echo '<div class="gallery-item"><a href="'.$loc.'"><img src="'.$loc.'_resized" alt="Image 001" /></a></div>';
//echo $loc."<br>";
$cate=$ary['cat'];

}



?>
		
		</div>

	
	
</div>	


	
<!-- <div id="Footer">
	<p><small>&copy; 2014 Code Ilm Labs</small></p>

	<div id="SocialLinks">
	<a href="https://www.facebook.com/ilmtechnolab"><img src="img/Facebook-Icon.png" width="32" height="32" alt="Facebook" /></a>
	
</div> -->

</body>
</html>
