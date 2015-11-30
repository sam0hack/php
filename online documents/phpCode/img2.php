<?php
ob_start();
//error_reporting(0);

?>
<?php

date_default_timezone_set('Asia/Kolkata');
$todayis= date('m/d/Y');



function convertDate($date) {
	$date = preg_replace('/\D/','/',$date);
	return date('Y-m-d',strtotime($date));
}

//print convertDate($todayis); //prints 1996-11-05

require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
require 'functions/sam_img_lib.php';


$img=$_REQUEST['loc'];
?>

<img src="<?php echo $img; ?>"  style="border: 1px solid black;height: 388px;margin-left: 274px;width: 688px;">
<div style="height: 30px;margin-top: 24px;margin-left: 464px;border: 1px solid burlywood;width: 412px;">
<a href="<?php echo $img; ?>">View large image</a>
<input style="float:right;" type="button" onclick="PrintMe()" class="btn btn-inverse" value="Print">
</div>
<script>
function PrintMe()
{

window.print();

}
</script>


