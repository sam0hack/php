<?php
error_reporting(0);
session_start();
$did=$_SESSION['did'];
$cid=$_SESSION['cid'];
$cod=$_SESSION['con_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MY Documents</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link href="css/bootswatch.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="css/main-style.css" rel="stylesheet">
  
  <!--<link href="css/bootstrap-responsive.min.css" rel="stylesheet">-->
<style type="text/css">
	
	
</style>
</head>

<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
 <script src="js/bsa.js"></script>
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" style="margin-right: 45px;margin-left: -141px;" href="index.php">[My Health Package]</a>
       <div class="nav-collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a onClick="pageTracker._link(this.href); return false;" href="index.php">Home</a></li>
          <li><a id="swatch-link" href="doctorhome.php">All</a></li>
          
          
         <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<b class="caret"></b></a>
            <ul class="dropdown-menu">
        

            <?php
         
         
         
         require 'database.php';
             $myo=mysql_query("select * from mydocs where cod='$cod'  group by cat")or die(mysql_error()."E7077"); 
             while ($qwerty=mysql_fetch_object($myo)) {
       
               
              ?>

          <?php 
          echo  "<li><a href='doctorhome.php?f=$qwerty->cat'>$qwerty->cat</a></li>"; 


        
      }
        ?>     
              <!-- <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>
              <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li> -->
            
            </ul>
          </li>
          




<!-- 
<li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<b class="caret"></b></a>
            <ul class="dropdown-menu">
        
           
              <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>
              <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li>
            
            </ul>
          </li> -->




          <li><a id="swatch-link" href="Doctor_Profile.php">My Profile</a></li>
          <li><a id="swatch-link" href="addpackage.php">Add Package</a></li>
 <li><a id="swatch-link" href="mypackage.php">My Packages</a></li>
          <li >
 
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
        <li><a id="swatch-link" href="billng.php">My practice </a></li>
          <li><a href="chngpsswd.php">Change password</a></li>
          <li><a href="logout.php">Logout <i class="icon-share-alt"></i></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>
<div class="container">
<!--	<div class="hero-unit" style="margin:0px; padding:10px 0px; text-align:left">-->
<!--    	<div class="span7">fetch value</div>-->
<!--        	<div class="span4 text-right">-->
	<!--                <form class="" style="">-->
	<!--                        <input type="text" class="input-medium search-query">-->
	<!--                        <button type="submit" class="btn btn-success">Search</button>-->
<!--                  </form>-->
<!--                  </div>-->
                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; margin:10px 0px"></div>
    
            
