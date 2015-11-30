<?php
session_start();
//require_once 'router.php';
error_reporting(E_ALL);

require 'database.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Doctor's Board</title>
<link href="css/style_home.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/main-style.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--JAVASCRIPT AJAX AND add text field-->
<script type="text/javascript" src="js/clinicalpagesamjs.js"></script>
<!--END JAVASCRIPT AJAX-->
  
  </head>

<body>

<div class="container">

<div class="navbar navbar-fixed-top">
     <div class="container" style="margin-top:2%;">
     <span style="float:right; margin-right: -166px;">


    
<div style="margin-left: 884px;">
<?php require 'city.php'; ?>
</div>
<span style="margin-left:809px;"><?php require_once 'login_status.php'; ?></span>
   </span>

     <div class="Fo_nt " style=" color:#faa300; font-family:'Comic Sans MS', cursive; font-weight:bold; margin-left:10%; width:100px;"><span class="span8">My</span></div>
<div class="Fo_nt" style="color:#79ab00; margin-left:20px; font-family:'Comic Sans MS', cursive; font-style:italic;"><span class="span1">Health</span></div>
<div class="Fo_nt" style="color:#1da2d8;  width:100px; font-family:'Comic Sans MS', cursive; font-style:italic;"><span class="span2" style="margin-left:163px;">Package</span></div>
        
       </div>
     </div>
   </div>
   


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:none!important; border-radius:8px; height:40px; color:#fff; font-weight:bold;" >
<div class="row">

	
</div>
</div>

	


  <div style="clear:both; "></div>



<div style="margin-left:160px; margin-bottom:3%; margin-top:10%; height:100px;">

       
       
<div style="float:left; " class="cl-effect-5 nav "><a style="color:#000000;" href="#"><span  data-hover=""><img src="img/1.png"  style="height:165px; width:165px; "/></span></a>				
</div>
<div style="float:left;" class="cl-effect-51 nav1 ">	<a style="color:#000000;" href="discussion.php"><span data-hover="" ><img src="img/2.png"  style="height:160px; width:160px;"/></span></a>				
</div>
<div style="float:left; " class="cl-effect-52 nav2 "><a style="color:#000000;" href="Login.php"><span data-hover=""><img src="img/3.png"  style="height:160px; width:160px; "/></span></a>				
</div>
</div>
<div style="width:100%; margin:10px auto;  height:100px;">
<form method="post" name="myform1" id="myform1" autocomplete="off" action="searchpackages.php">
<div style="margin-left:13%;" ><input type="text"  name="ival"   id="cms1" onKeyUp="lookup_cms(this.value,this.id);" placeholder="Treatment"  style="width:560px; height:20px; margin:5px;" />
<input type="submit"  value="Search" name="isearch" class="btn-success222"/>

<!---CHK HERE suggestions-->

<div  id="suggestions_cus" style="display:none; fontsize:5px;margin-left:-18px;">
                  <ul id="autoSuggestionsList_cus" style="color:rgb(60, 16, 199);border:1px solid black;width: 568px;" onclick="getsrch();">
                  </ul>
                </div>



</div>
</form>

<div style="text-align:center; font-size:24px; font-family:'Comic Sans MS', cursive;   margin-top:-10px;  font-style:italic; color:#063;"><b class="p1">Search Packages for your Disease and Treatment</b></div>

</div>
</body>
</html>
