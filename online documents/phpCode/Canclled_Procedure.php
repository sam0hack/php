<body style="background:rgb(76, 166, 226) !important;">
<?php
session_start();
ob_start();
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
require 'functions/sam_img_lib.php';
$username=$_SESSION['username'];
require 'functions/DataInsert.php';

if(isset($_POST['subadd']))
{
 $mdata=$_POST['mdata'];

$nj = new DataInsert();
$nj->INSERT($mdata,'My_Bills',$username);


}


?>

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

date_default_timezone_set('Asia/Kolkata');
$todayis= date('m/d/Y');



function convertDate($date) {
  $date = preg_replace('/\D/','/',$date);
  return date('Y-m-d',strtotime($date));
}


?>
</body>
  <style>
  #opd_bill {
background: #AEB4C2;
color: #000;
font-size: 85%;
margin: 0 auto;
width: 100%;
padding: 6px 0%;
}
#opd_bill {
background: url(bg_top.png) repeat;
color: #FFF;
font-size: 14px;
font-weight: 700;
width: 1000px;
padding: 6px 0px;
border-top: 1px solid #FFF;
margin: 0 auto;
}
.dash_width {
width: 100px;
}

  </style>
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
<!--JAVASCRIPT AJAX AND add text field-->
<script type="text/javascript" src="js/clinicalpagesamjs.js"></script>
<!--END JAVASCRIPT AJAX-->
  
  

 
 <!-----CHK HERE suggestions----->
 

<div  id="suggestions_cus" style="display:none; fontsize:5px;margin-left:501px;">
                  <ul id="autoSuggestionsList_cus" style="color:rgb(60, 16, 199);border:1px solid black;width: 227px;" onclick=getsrch()>
                  </ul>
                </div>
 
 

  
  
    
            
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
       <a class="brand" href="index.php" style="color:#336586; padding: 27px 0px 10px; margin-left:100px;">[Practice Management System]</a>
      
         <a class="brand" href="doctorhome.php" style="color:#336586; font-size:14PX;  padding: 4px 0px 10px; margin-left:342px;">My Health Records</a>
      
        
        <ul class="nav pull-right" id="main-menu-right">
        
          <li><a href="Login.php" style="color:#336586; background:none; padding:4px 19px 15px;">Logout</a></li>
        </ul>
       </div>
     </div>
   </div>

 

 
 
 
 

<div class="hero-unit1 h_top2 r_b2" style="background:#629EBE !important; border-radius:0px; height:20px; color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; width: 100px; margin-left:20px; border-right: 1px solid #fff;">

                                   <span style="color:#FFFFFF;">Appointments</span>

                              

                            </div>
                            
                            <div style=" float:left; width:152px; border-right: 1px solid #fff;">

                                <span style="color:#FFFFFF; margin-left:25px;"><a style="color:#fff; text-decoration:none;" href="Ot_Scheduler.php">OT Scheduler</a></span>

                              

                            </div>
<div style=" float:left; margin-left:20px; width:75px; border-right: 1px solid #fff;">


                            

                                <span style="color:#FFFFFF;"><a style="color:#fff; text-decoration:none;" href="billng.php">My Bills</a></span>

                            </div>
                            <div style=" float:left; width: 150px; border-right: 1px solid #fff;">

                             

                                <span style="color:#FFFFFF; margin-left:15px;">Monthly Accounts</span>

                            </div>
                            <div style=" float:left; width:170px; border-right: 1px solid #fff;">

                                

                                <span style="color:#FFFFFF; margin-left:25px;">  Account Summary</span>

                            </div>

                          
                            
                            <div style=" float:left; width:61px; margin-left:50px; border-right: 1px solid #fff;">

                                   <span style="color:#FFFFFF; margin-left:-27px;">Analytics</span>

                              

                            </div>
 <div style=" float:left; width: 100px; margin-left:25px;">

                                   <span style="color:#FFFFFF;">My Practice</span>

                              

                            </div>

                            
                            


                   </div>
                   </div>






 <div class="hero-unit1 h_top2 r_b2" style="background:#fff !important; border-radius:0px; height:20px; color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; width:250px; margin-left:20px;">

                                   <span style="color:#629EBE; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Cancelled Procedure List
                                  </span>
                                  
                                  
                                 
        

                              

                            </div>
                            <div style=" float:right; width:250px; margin-right:15px;">
                            <span style="color:#fff; float:right; font-family:Verdana, Geneva, sans-serif; font-size:14px;"><a style="color:#629EBE; text-decoration:none;" href="Ot_Scheduler.php">Back to OT Scheduler
                                  </a></span>
                                 </div>
                            
                   </div>
                   </div>

 



<form method="post">
                   <div class="hero-unit1 h_top2 r_b2" style="background:#62CADD !important; border-radius:0px;  color:#fff;   font-weight:bold; height:20px; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:40px; width:150px;">
 <div style="color:#fff;">Date</div>


                               
                            </div>
                            <div style=" float:left;  width:170px;">

                               <div style="color:#fff;">Patient Name</div>

                       </div>
                            <div style=" float:left;width:170px;">

                                <div style="color:#fff;">Surgery</div>

                  </div>
<div style=" float:left; width:160px;">

                                <div style="color:#fff;">Hospital Name </div>


                            </div>
                            <div style=" float:left; width:90px;">

                               <div style="color:#fff;">Remarks</div>


                            </div>
</div>
</div>
           
           
           
                       
       
     <div class="hero-unit1 h_top2 r_b2" style="background:#fff !important;  border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.04.2014</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:125px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:170px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Add to Scheduler&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Delete</a></div>


                            </div>
</div>
</div>


 <div class="hero-unit1 h_top2 r_b2" style="background:#E3EEF6 !important; border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.04.2014</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:125px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:170px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Add to Scheduler&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Delete</a></div>


                            </div>
</div>
</div>





   <div class="hero-unit1 h_top2 r_b2" style="background:#fff !important;  border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.04.2014</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:125px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:170px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Add to Scheduler&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Delete</a></div>


                            </div>
</div>
</div>


 <div class="hero-unit1 h_top2 r_b2" style="background:#E3EEF6 !important; border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.04.2014</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:125px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:170px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Add to Scheduler&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Delete</a></div>


                            </div>
</div>
</div>


                       
         </form>              
                       
  










                            
</div>
</div>
            
            
