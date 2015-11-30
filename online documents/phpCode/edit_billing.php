<?php
session_start();
ob_start();
 $ttl='n';
?>
<?php
if(empty($_SESSION['username']))
{
header('location:index.php');
}
?>
<?php
$cod=$_SESSION['con_id'];
require 'headwithsearch.php';
require 'varfilter.php';
require 'database.php';
?>

<div class="container" style="margin-top:50px;">

<div class="navbar navbar-fixed-top" style="width: 940px;margin: 0px auto; padding-top:51px;">
   <div class="navbar-inner" style="background:#F7FBFD; height:78px; border:none;">
     <div class="container">
     <div class="brand" href="index.php" style="color:#336586; padding:14px 0px 7px;"></div>
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <p class="brand" href="index.php" style="color:#336586; padding: 27px 0px 10px; margin-left:5px;">Practice Management System</p>
      
         <a class="brand" href="doctorhome.php" style="color:#336586; font-size:14PX;  padding: 4px 0px 10px; float:right;margin-right: 5px;">My Health Records</a>
      
        
        <ul class="nav pull-right" id="main-menu-right">
        

        </ul>
       </div>
     </div>
   </div>

     <div class="hero-unit1 h_top2 r_b2" style="background:#789BA3 !important; border-radius:0px;  color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:10px;">
Patient Name
Procedure Name
Hospital Name
Bill Date
Charge
Category
Type
</div>
</div>
</div>
</div>