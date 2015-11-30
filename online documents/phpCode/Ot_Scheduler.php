<body style="background:#336586 !important;">
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






 <div class="hero-unit1 h_top2 r_b2" style="background:#CDF1E0 !important; border-radius:0px; height:20px; color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; width: 150px; margin-left:20px;">

                                   <span style="color:#6B7B9A; font-family:Verdana, Geneva, sans-serif; font-size:18px;">OT Scheduler 
                                  </span>
                                 
                                  
                                 
        

                              

                            </div>
                            <div style="float:right;">
                             <span style=" font-size:15px;"><a style=" text-decoration:none; color:#336586;" href="Canclled_Procedure.php">Cancelled Procedure&nbsp;|</a></span>
                                  <span style="color:#336586; font-size:15px;"><a style="color:#336586;  text-decoration:none;" href="Operation_Patient.php">Operated Patients &nbsp;&nbsp;</a></span>
                                 
                         
                           </div>
                   </div>
                   </div>

 

<div class="hero-unit1 h_top2 r_b2" style="background:#fff !important; border-radius:0px; height:20px; color:#fff; font-weight:bold; " >

<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:20px; width: 80px;">

                                <input type="radio" value="specificDate" name="data[]"  /> 

                                <span style="color:#336586;">Today</span>

                            </div>
                            
                             <div style=" float:left; width: 120px;">

                                <input type="radio" value="specificDate" name="data[]"  /> 

                                <span style="color:#336586;">Tomorrow</span>

                            </div>
                            <div style=" float:left; width: 120px;">

                                <input type="radio" value="specificDate" name="data[]"  /> 

                                <span style="color:#336586;">This Month</span>

                            </div>
                            <div style=" float:left; width: 120px;">

                                <input type="radio" value="specificDate" name="data[]"  /> 

                                <span style="color:#336586;"> Last Month</span>

                            </div>
<div style=" float:left; width:120px;">

                                <input type="button" value="view" name="data[]" style="background: #1A6A8E;
color: #FFF;
border-radius: 5PX;
height:25px;
width:80px;
border: none;"  /> 

                              

      

                            </div>
      
<form method="post" >

                            <div style=" float:left; width: 139px;">

                               <select name="hosp" style="width: 130px; height:25px; margin-top:-3px;" />
                             
<?php  
$rtr=mysql_query("select id,hospital from My_Bills where doc_id='$username' GROUP BY hospital ");
while($prq=mysql_fetch_array($rtr))
{
echo '<option value="'.$prq[1].'"">'.$prq[1].'</option>';

}


?>


                                   </select> 

                                

                            </div>
                            
                            
                            <div style=" float:left; width:139px;">

                               <select  name="dat" style="width: 130px; height:25px;  margin-top:-3px;" />


<?php  
$rtr=mysql_query("select id,bill_date from My_Bills where doc_id='$username' GROUP BY MONTH(bill_date)");
while($prq=mysql_fetch_array($rtr))
{
echo '<option value="'.$prq[1].'"">'. date("M", strtotime($prq[1])) .'</option>';
//QUERYSELECT * FROM `My_Bills` WHERE `hospital`='Apollo' AND `bill_date` LIKE '%9%' ORDER BY id DESCl

}


?>


                                </select> 

                                

                            </div>
                            
                            
                            <div style=" float:left; width:50px;">

                                <input type="submit" value="Show" name="show2"  style="background: #1A6A8E;
color: #FFF;
 margin-top:-3px;
border-radius:5PX;
height:25px;
width:72px;
border: none;" /> 

                              

                            </div>
                            
                            


                            
                            



                   </div>
                   </div>
</form>

<form method="post">
                   <div class="hero-unit1 h_top2 r_b2" style="background:#CDF1E0 !important; border-radius:0px;  color:#fff;   font-weight:bold; height:25px;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:40px; width:140px;">
 <div style="color:#336586;">Date</div>


                               
                            </div>
                            <div style=" float:left;  width:180px;">

                               <div style="color:#336586;">Patient Name</div>

                       </div>
                            <div style=" float:left;width:180px;">

                                <div style="color:#336586;">Surgery</div>

                  </div>
<div style=" float:left; width:200px;">

                                <div style="color:#336586;">Hospital Name </div>


                            </div>
                            <div style=" float:left; width:90px;">

                               <div style="color:#336586;">Remarks</div>


                            </div>
</div>
</div>
           
           
           
                       
       
                   <div class="hero-unit1 h_top2 r_b2" style="background:#fff !important; border-radius:0px;  color:#fff;  font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.05.2013</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:110px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Cancel&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Done</a></div>


                            </div>
</div>
</div>






  <div class="hero-unit1 h_top2 r_b2" style="background:#E3EEF6 !important; border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.05.2013</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:110px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Cancel&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Done</a></div>


                            </div>
</div>
</div>



  <div class="hero-unit1 h_top2 r_b2" style="background:#fff !important; border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.05.2013</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:110px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Cancel&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Done</a></div>


                            </div>
</div>
</div>


  <div class="hero-unit1 h_top2 r_b2" style="background:#E3EEF6 !important; border-radius:0px;  color:#fff;   font-weight:bold; " >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:30px; width:150px; word-wrap:break-word;">
 <div style="color:#336586;">12.05.2013</div>


                               
                            </div>
                            <div style=" float:left;  width:175px; word-wrap:break-word;">

                               <div style="color:#336586;">Lal Kumar singh</div>

                       </div>
                            <div style=" float:left;width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Ear Rihinoplasy</div>

                  </div>
<div style=" float:left; width:185px; word-wrap:break-word;">

                                <div style="color:#336586;">Apollo Noida</div>


                            </div>
                            <div style=" float:left; width:110px; word-wrap:break-word; ">

                               <div style="color:#336586;">Head Neck S</div>


                            </div>
                            
                            
                             <div style=" float:left; width:100px; word-wrap:break-word; ">

                               <div style="color:#000;"><a style="text-decoration:none; color:#1DB05D;" href="">Cancel&nbsp;||</a><a style="text-decoration:none; color:#f00;" href="">Done</a></div>


                            </div>
</div>
</div>
                       
         </form>              
                       
  










                            
</div>
</div>
            
            
