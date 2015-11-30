 <script type="text/javascript">
function delme(id)
{ 
  var txt;
var r = confirm("Do you want delete this item!");
if (r == true) {
    txt = "You pressed OK!";
//alert(id);

window.location='billng.php?dl='+id;
} else {
    txt = "You pressed Cancel!";
}
}
</script>


 <script type="text/javascript" src="js/jquery.min.js"></script>
<!--JAVASCRIPT AJAX AND add text field-->
<script type="text/javascript" src="js/clinicalpagesamjs.js"></script>
  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
<!--   <link rel="stylesheet" href="/resources/demos/style.css">  -->
<style type="text/css">
  #popup_window{
padding: 4px;
background: #267E8A;
cursor: pointer;
color: #FCFCFC;
/*margin: 200px 0px 0px 200px;*/
}
.popup-overlay {
    width: 100%;
    height: 100%;
    position: fixed;
    background: rgba(196, 196, 196, .85);
    top: 0;
    left: 100%;
    opacity: 0;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    -webkit-transition: opacity .2s ease-out;
    -moz-transition: opacity .2s ease-out;
    -ms-transition: opacity .2s ease-out;
    -o-transition: opacity .2s ease-out;
    transition: opacity .2s ease-out;
}
.overlay .popup-overlay {
    opacity: 1;
    left: 0
}
.popup {
    position: fixed;
    top: 25%;
    left: 50%;
    z-index: -9999;
}
.popup .popup-body {
    background: #ffffff;
    background: -moz-linear-gradient(top, #ffffff 0%, #f7f7f7 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #f7f7f7));
    background: -webkit-linear-gradient(top, #ffffff 0%, #f7f7f7 100%);
    background: -o-linear-gradient(top, #ffffff 0%, #f7f7f7 100%);
    background: -ms-linear-gradient(top, #ffffff 0%, #f7f7f7 100%);
    background: linear-gradient(to bottom, #ffffff 0%, #f7f7f7 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f7f7f7', GradientType=0);
    opacity: 0;
    min-height: 150px;
    width: 400px;
    margin-left: -200px;
    padding: 20px;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    -webkit-transition: opacity .2s ease-out;
    -moz-transition: opacity .2s ease-out;
    -ms-transition: opacity .2s ease-out;
    -o-transition: opacity .2s ease-out;
    transition: opacity .2s ease-out;
    position: relative;
    -moz-box-shadow: 1px 2px 3px 1px rgb(185, 185, 185);
    -webkit-box-shadow: 1px 2px 3px 1px rgb(185, 185, 185);
    box-shadow: 1px 2px 3px 1px rgb(185, 185, 185);
    text-align: center;
    border: 1px solid #e9e9e9;
}
.popup.visible, .popup.transitioning {
    z-index: 9999;
}
.popup.visible .popup-body {
    opacity: 1;
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}
.popup .popup-exit {
    cursor: pointer;
    display: block;
    width: 24px;
    height: 24px;
    position: absolute;
    top: -150px;
    right: -195px;
    background: url("images/quit.png") no-repeat;
 
}
.popup .popup-content {
    overflow-y: auto;
}
.popup-content .popup-title {
    font-size: 24px;
    border-bottom: 1px solid #e9e9e9;
    padding-bottom: 10px;
}
.popup-content p {
    font-size: 13px;
    text-align: justify;
}
</style>
<script type="text/javascript">
  
$(window).load(function(){
jQuery(document).ready(function ($) {
 
    $('[data-popup-target]').click(function () {
        $('html').addClass('overlay');
        var activePopup = $(this).attr('data-popup-target');
        $(activePopup).addClass('visible');
 
    });
 
    $(document).keyup(function (e) {
        if (e.keyCode == 27 && $('html').hasClass('overlay')) {
            clearPopup();
        }
    });
 
    $('.popup-exit').click(function () {
        clearPopup();
 
    });
 
    $('.popup-overlay').click(function () {
        clearPopup();
    });
 
    function clearPopup() {
        $('.popup.visible').addClass('transitioning').removeClass('visible');
        $('html').removeClass('overlay');
 
        setTimeout(function () {
            $('.popup').removeClass('transitioning');
        }, 200);
    }
 
});
});









  function addcatpopup()
  {

//alert("cat");
$(function() {
    $( "#dialog1" ).dialog();
  });


  }

function addtypepopup()
{
//alert("type");
$(function() {
    $( "#dialog2" ).dialog();
  });


}

</script>
<body style="background:#fff !important;">
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
require 'functions/sam_img_lib.php';
$username=$_SESSION['username'];
require 'functions/DataInsert.php';

if(isset($_POST['subadd']))
{
 $mdata=$_POST['mdata'];

$nj = new DataInsert();
$nj->INSERT($mdata,'My_Bills',$username);


}

if ($_REQUEST['dl']) {
  $dl=$_REQUEST['dl'];
mysql_query("delete from My_Bills where id='$dl'");

}


?>

<link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
 <!--  <link rel="stylesheet" href="/resources/demos/style.css"> -->
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
  
 

 
 <!---CHK HERE suggestions-->


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
       <p class="brand" href="index.php" style="color:#336586; padding: 27px 0px 10px; margin-left:5px;">Practice Management System</p>
      
         <a class="brand" href="doctorhome.php" style="color:#336586; font-size:14PX;  padding: 4px 0px 10px; float:right;margin-right: 5px;">My Health Records</a>
      
        
        <ul class="nav pull-right" id="main-menu-right">
        
         <!--  <li><a href="Login.php" style="color:#336586; background:none; padding:4px 19px 15px;">Logout</a></li> -->
        </ul>
       </div>
     </div>
   </div>



 
 
 

<div class="hero-unit1 h_top2 r_b2" style="background:#629EBE !important; border-radius:0px; height:20px; color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; width: 100px; margin-left:20px; border-right: 1px solid #fff;">

                                   <span style="color:black;">Appointments</span>

                              

                            </div>
                            
                            <div style=" float:left; width:152px; border-right: 1px solid #fff;">

                                   <span style="color:black; margin-left:25px;"><a style="color:#fff; text-decoration:none;" href="Ot_Scheduler.php">OT Scheduler</a></span>

                              

                            </div>
<div style=" float:left; margin-left:20px; width:75px; border-right: 1px solid #fff;">


                            

                                <span style="color:black;"><a style="color:#fff; text-decoration:none;" href="billng.php">My Bills</a></span>

                            </div>
                            <div style=" float:left; width: 150px; border-right: 1px solid #fff;">

                             

                                <span style="color:black; margin-left:15px;">Monthly Accounts</span>

                            </div>
                            <div style=" float:left; width:170px; border-right: 1px solid #fff;">

                                

                                <span style="color:black; margin-left:25px;">  Account Summary</span>

                            </div>

                          
                            
                            <div style=" float:left; width:61px; margin-left:50px; border-right: 1px solid #fff;">

                                   <span style="color:black; margin-left:-27px;">Analytics</span>

                              

                            </div>
 <div style=" float:left; width: 100px; margin-left:25px;">

                                   <span style="color:black;">My Practice</span>

                              

                            </div>

                            
                            


                   </div>
                   </div>






 <div class="hero-unit1 h_top2 r_b2" style="background:#000 !important; border-radius:0px; height:20px; color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; width: 100px; margin-left:20px;">

                                   <span style="color:black; font-size:18px;">My Bills 
                                  </span>
                                 
                                  
                                 
        

                              

                            </div>
                            <div style="float:right;">
            
                 
                      
                        
            

   <form method="post" action="search.php">
    <input type="text" placeholder="Search Patient....." type="text" placeholder="Search an email ID of Patient
" name="srch_txt" class="input-medium search-query"  style="margin-top:-5px; width:300px;" />
    <button type="submit"  style="background:#034482 !important;" name="srch" class="btn btn-success">Search</button>
    <!-- <input type="submit"  value="" style="background:url(img/search.png);background-repeat: no-repeat;color: white; margin-top:-21px;width:55px;height: 31px;border: none;padding-right: 22px;margin-left:-34px;" /> -->
                            </form>
                            
                         
                           </div>
                   </div>
                   </div>

 

<div class="hero-unit1 h_top2 r_b2" style="background:#fff !important; border-radius:0px; height:20px; color:#fff; font-weight:bold; " >

<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:20px; width: 80px;">
<form method="post">

                                <input type="radio" value="today" name="day[]"  /> 

                                <span style="color:#336586;">Today</span>

                            </div>
                            
                             <div style=" float:left; width: 103px;">

                                <input type="radio" value="yesterday" name="day[]"  /> 

                                <span style="color:#336586;">Yesterday</span>

                            </div>
                            <div style=" float:left; width: 103px;">

                                <input type="radio" value="thismonth" name="day[]"  /> 

                                <span style="color:#336586;">This Month</span>

                            </div>
                            <div style=" float:left; width: 103px;">

                                <input type="radio" value="lastmonth" name="day[]"  /> 

                                <span style="color:#336586;"> Last Month</span>

                            </div>
                              <div style=" float:left; width: 49px;">

                                <input type="radio" value="year" name="day[]"  /> 

                                <span style="color:#336586;"> Year</span>

                            </div>
              <div style=" float:left; width:120px;">

                                <input type="submit" value="view" name="subday" style="background: #1A6A8E;
color: #FFF;
border-radius: 5PX;
height:25px;
width:80px;
border: none;
margin-top: -10px;" 
 /> 

                              

</form>
      

                            </div>
      
<form method="post" >

                            <div style=" float:left; width: 139px;">

                               <select name="hosp" style="width: 130px; height:25px; margin-top:-11px;" />
                             
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

                               <select  name="dat" style="width: 130px; height:25px;  margin-top:-11px;" />


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
<div class="hero-unit1 h_top2 r_b2" style="background:#7DA3AB !important;width: 1100px; border-radius:0px;  color:#fff; font-weight:bold; height:130px;" >
<div class="row" style="margin-left:-90px;">
<div style=" float:left; margin-left:147px;">
 <div style="color:black;"></div>

<div>
                                <input type="text" required="required" placeholder="Patient Name" name="mdata[]"  style="width: 100px; height:25px;" /> 
</div>
                               
                            </div>
                            <div style=" float:left; margin-left:20px;">

                               <div style="color:black;"></div>

<div>
                                <input type="text" required="required" placeholder="Procedure name" name="mdata[]" style="width: 100px; height: 25px;"  /> 
</div>
                            </div>
                            <div style=" float:left; margin-left:20px;">

                                <div style="color:black;"></div>

<div>
                                <input type="text" required="required"  placeholder="Hospital name" name="mdata[]"  style="width: 100px; height: 25px;" /> 
</div>
                            </div>
<div style=" float:left; margin-left:20px;">

                                <div style="color:black;"></div>

<div>
                                <input type="date" required="required"  name="mdata[]"  style="width: 100px; height:25px;" /> 
</div>

                            </div>
                            <div style=" float:left; margin-left:20px;">

                               <div style="color:black;"></div>

<div>
                                <input type="text" placeholder="Amount" name="mdata[]"  style="width: 100px; height:25px;" /> 
</div>

                            </div>
                            
                             <div style=" float:left; margin-left:30px;">

                               <div style="color:black;"></div>

<div>
                               
<?php
$irc=mysql_query("select * from category")or die(mysql_error()."TYPE16");
?>

 <select name="mdata[]" required="required"  style="width: 100px; height:25px;" />
<?php
 while($ftc=mysql_fetch_array($irc))
 {
 echo "<option value='$ftc[1]'>$ftc[1]</option>";
 }
?>
<!-- <option value="General ward">General ward</option>
<option value="Semi private">Semi private</option>
<option value="Private">Private</option>
<option value="Emergency">Emergency</option>
<option value="Deluxe">Deluxe</option>
<option value="OPD">OPD</option>
 -->

</select><a id="popup_window" data-popup-target="#example-popup">+</a> 
                                
                               
                                
                                
                                
</div>
                            </div>





  <div style=" float:left; margin-left:20px;">

                               <div style="color:black;"></div>

<div>
                               
<?php
$irc=mysql_query("select * from procedure_types")or die(mysql_error()."TYPE16");
?>

 <select name="mdata[]" required="required"  style="width: 100px; height:25px;" />
<?php
while($ftc=mysql_fetch_array($irc))
{
echo "<option value='$ftc[1]'>$ftc[1]</option>";
}
?>


</select> <a id="popup_window" data-popup-target="#example-popup2"> +</a> 
                                
                               
                                
                                
                                
</div>
                            </div>










 <div style=" float:left; margin-left:8px; margin-top:1px;">

                               

<div>
                               
<input type="submit" value="Add" name="subadd" style="background: #1A6A8E;color: #FFF;border-radius:5PX;height:25px;width:50px;border: none;" > 
                               
                                
                                
                                
</div>
                           











</div>
</div>
                       
         
                   <div class="hero-unit1 h_top2 r_b2" style="background:#E3EEF6 !important; border-radius:0px;  color:#fff; font-weight:bold; height:30px;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:20px; width:130px;">
 <div style="color:#336586;">Patient Name</div>


                               
                            </div>
                            <div style=" float:left; width:160px;">

                               <div style="color:#336586;">Procedure Name</div>


                            </div>
                            
                            
                            <div style=" float:left;width:150px;">

                                <div style="color:#336586;">Hospital Name</div>


                            </div>
<div style=" float:left;width:120px;">

                                <div style="color:#336586;">Bill Date </div>



                            </div>
                            <div style=" float:left; width:140px;">

                               <div style="color:#336586;">Charge</div>


                            </div>
                            
                             <div style=" float:left;width:140px;">

                               <div style="color:#336586;">Category</div>


                            </div>
                            
                             <div style=" float:left; width:30px;">

                               <div style="color:#336586;">Type </div>
                               

<div>
                               
    
                                
                                
</div>
                            </div>















         











</div>
</div>
                       
         </form>              
                       



<?php 

$flag=0;

if(isset($_POST['show2']))
{
$flag=1;
$hosp=$_POST['hosp'];
$dat=$_POST['dat'];
$mnt=date("m", strtotime($dat));
$j=1;
$r=mysql_query("SELECT * FROM `My_Bills` WHERE `hospital`='$hosp' AND `bill_date` LIKE '%$mnt%' ORDER BY id DESC");
$tot=mysql_query("SELECT SUM(`appx_chrg`) FROM `My_Bills` WHERE `hospital`='$hosp' AND `bill_date` LIKE '%$mnt%' ");
$ttl=mysql_fetch_row($tot);
$ttl=$ttl[0];
while($res=mysql_fetch_array($r))
{
?>
            

                       <div class="hero-unit1 h_top2 r_b2" <?php if($j%2==0) { ?>style="background: #E3EEF6 !important; border-radius:0px;  color:#336586 !important; font-weight:bold;"  <?php }else { ?>style=" background:#fff !important; border-radius:0px !important; color:#336586; font-weight:bold;" <?php } ?> >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:10px;">
 <div style="color:black;"><?php echo $j; ?>.</div>


                               
                            </div>
                            <form method="post">
<div style=" float:left; margin-left:30px; width:120px; word-wrap:break-word;">

<input type="hidden" name="ktna[]" value="<?php echo $res['id']; ?>">
 <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['patient_name']; ?>"></div>


                                       
                                    </div>
                                    <div style=" float:left; width:156px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 129px;height: 46px;" value="<?php echo $res['procedure_name']; ?>"></div>


                                    </div>
                                    <div style=" float:left;width:156px; word-wrap:break-word;">

                                        <div style="color:black;"><input type="text" name="ktna[]" style="width: 129px;height: 46px;" value="<?php echo $res['hospital']; ?>"></div>

                                       </div>
                                         <div style=" float:left; width:120px; word-wrap:break-word;">

                                        <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['bill_date']; ?>"></div>


                                    </div>
                                    <div style=" float:left; width:120px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['appx_chrg']; ?>"></div>


                                    </div>
                                    
                                      <div style=" float:left; width:104px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['cat']; ?>"></div>


                                    </div>

                                     <div style=" float:left; width:102px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 100px;height: 46px;" value="<?php echo $res['procedure_type_id']; ?>"></div>


                                    </div>



<a href="#" class="btn btn-danger" onclick="delme(this.id)" id="<?php echo $res['id']; ?>" style="float: right;">Delete</a>

<input type="submit" class="btn btn-inverted" style="float:right;margin-right: 33px;" value="Edit" name="editktna">
</div>
</form>
</div>

<?php 
$j++;
}


}











if(isset($_POST['subday']))
{
 
$flag=1;
$day=$_POST['day'];

date_default_timezone_set('Asia/Kolkata');
$thetoday= date('Y-m-d');

$theyear=date('Y');
$themonth= date('m');
$theday= date('d');
$r=1;
if($day[0]=="today")
{
$r=mysql_query("SELECT * FROM `My_Bills` WHERE  `bill_date`='$thetoday' ORDER BY id DESC")or die(mysql_error()."Today Error");
$tot=mysql_query("SELECT SUM(`appx_chrg`) FROM `My_Bills` WHERE  `bill_date`='$thetoday'")or die(mysql_error()."Today Error");
$ttl=mysql_fetch_row($tot);
$ttl=$ttl[0];
}if ($day[0]=="yesterday") {
$yes=$theday-1;
$yesterday=$theyear."-".$themonth."-".$yes;
$r=mysql_query("SELECT * FROM `My_Bills` WHERE  `bill_date`='$yesterday' ORDER BY id DESC")or die(mysql_error()."Today Error");
$tot=mysql_query("SELECT SUM(`appx_chrg`) FROM `My_Bills` WHERE  `bill_date`='$yesterday' ")or die(mysql_error()."Today Error");
$ttl=mysql_fetch_row($tot);
$ttl=$ttl[0];

}if ($day[0]=="thismonth") {
$r=mysql_query("SELECT * FROM `My_Bills` WHERE  MONTH(`bill_date`)='$themonth' ORDER BY id DESC")or die(mysql_error()."Today Error");
$tot=mysql_query("SELECT SUM(`appx_chrg`) FROM `My_Bills` WHERE  MONTH(`bill_date`)='$themonth' ")or die(mysql_error()."Today Error");

$ttl=mysql_fetch_row($tot);
$ttl=$ttl[0];


}if ($day[0]=="lastmonth") {
$mnth=$themonth-1;
$r=mysql_query("SELECT * FROM `My_Bills` WHERE  MONTH(`bill_date`)='$mnth' ORDER BY id DESC")or die(mysql_error()."Today Error");
$tot=mysql_query("SELECT SUM(`appx_chrg`) FROM `My_Bills` WHERE  MONTH(`bill_date`)='$mnth' ")or die(mysql_error()."Today Error");
$ttl=mysql_fetch_row($tot);
$ttl=$ttl[0];

}
if ($day[0]=="year") {
//$mnth=$themonth-1;
$r=mysql_query("SELECT * FROM `My_Bills` WHERE  YEAR(`bill_date`)='$theyear' ORDER BY id DESC")or die(mysql_error()."Today Error");
$tot=mysql_query("SELECT SUM(`appx_chrg`) FROM `My_Bills` WHERE  YEAR(`bill_date`)='$theyear' ")or die(mysql_error()."Today Error");
$ttl=mysql_fetch_row($tot);
$ttl=$ttl[0];

}


$j=1;

while($res=mysql_fetch_array($r))
{
?>
            
 







     
                       <div class="hero-unit1 h_top2 r_b2" <?php if($j%2==0) { ?>style="background: #E3EEF6 !important; border-radius:0px;  color:#336586 !important; font-weight:bold;"  <?php }else { ?>style=" background:#fff !important; border-radius:0px !important; color:#336586; font-weight:bold;" <?php } ?> >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:10px;">
 <div style="color:black;"><?php echo $j; ?>.</div>


                               
                            </div>
                            <form method="post">
<div style=" float:left; margin-left:30px; width:120px; word-wrap:break-word;">

<input type="hidden" name="ktna[]" value="<?php echo $res['id']; ?>">
 <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['patient_name']; ?>"></div>


                                       
                                    </div>
                                    <div style=" float:left; width:156px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 129px;height: 46px;" value="<?php echo $res['procedure_name']; ?>"></div>


                                    </div>
                                    <div style=" float:left;width:156px; word-wrap:break-word;">

                                        <div style="color:black;"><input type="text" name="ktna[]" style="width: 129px;height: 46px;" value="<?php echo $res['hospital']; ?>"></div>

                                       </div>
                                         <div style=" float:left; width:120px; word-wrap:break-word;">

                                        <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['bill_date']; ?>"></div>


                                    </div>
                                    <div style=" float:left; width:120px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['appx_chrg']; ?>"></div>


                                    </div>
                                    
                                      <div style=" float:left; width:104px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['cat']; ?>"></div>


                                    </div>

                                     <div style=" float:left; width:102px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 100px;height: 46px;" value="<?php echo $res['procedure_type_id']; ?>"></div>


                                    </div>



<a href="#" class="btn btn-danger" onclick="delme(this.id)" id="<?php echo $res['id']; ?>" style="float: right;">Delete</a>

<input type="submit" class="btn btn-inverted" style="float:right;margin-right: 33px;" value="Edit" name="editktna">
</div>
</form>
</div>
<?php 
$j++;
}
}
?> 
<?php 
if($flag==0)
{

$nj = new DataInsert();
$r=$nj->SELECT('My_Bills','DESC',$username);
$j=1;
while($res=mysql_fetch_array($r))
{

?>
            
            
                       <div class="hero-unit1 h_top2 r_b2" <?php if($j%2==0) { ?>style="background: #E3EEF6 !important; border-radius:0px;  color:#336586 !important; font-weight:bold;"  <?php }else { ?>style=" background:#fff !important; border-radius:0px !important; color:#336586; font-weight:bold;" <?php } ?> >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:10px;">
 <div style="color:black;"><?php echo $j; ?>.</div>


                               
                            </div>
                            <form method="post">
<div style=" float:left; margin-left:30px; width:120px; word-wrap:break-word;">

<input type="hidden" name="ktna[]" value="<?php echo $res['id']; ?>">
 <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['patient_name']; ?>"></div>


                                       
                                    </div>
                                    <div style=" float:left; width:156px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 129px;height: 46px;" value="<?php echo $res['procedure_name']; ?>"></div>


                                    </div>
                                    <div style=" float:left;width:156px; word-wrap:break-word;">

                                        <div style="color:black;"><input type="text" name="ktna[]" style="width: 129px;height: 46px;" value="<?php echo $res['hospital']; ?>"></div>

                                       </div>
                                         <div style=" float:left; width:120px; word-wrap:break-word;">

                                        <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['bill_date']; ?>"></div>


                                    </div>
                                    <div style=" float:left; width:120px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['appx_chrg']; ?>"></div>


                                    </div>
                                    
                                      <div style=" float:left; width:104px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 94px;height: 46px;" value="<?php echo $res['cat']; ?>"></div>


                                    </div>

                                     <div style=" float:left; width:102px; word-wrap:break-word;">

                                       <div style="color:black;"><input type="text" name="ktna[]" style="width: 100px;height: 46px;" value="<?php echo $res['procedure_type_id']; ?>"></div>


                                    </div>



<a href="#" class="btn btn-danger" onclick="delme(this.id)" id="<?php echo $res['id']; ?>" style="float: right;">Delete</a>

<input type="submit" class="btn btn-inverted" style="float:right;margin-right: 33px;" value="Edit" name="editktna">
</div>
</form>
</div>
<?php 
$j++;
}
}
?> 

            
              <div class="hero-unit1 h_top2 r_b2" style="background:#487A97 !important; border-radius:0px;  color:#fff; font-weight:bold;" >
<div class="row" style="margin-left:0px;">
<div style=" float:left; margin-left:10px;">
 <div style="color:#000; border: 1px solid #fff;
width: 15px;
height: 15px;
text-align: center; margin-left: 3px;">1</div>


                               
                            </div>

                            <div style=" float:left; width:10px; word-wrap:break-word;">

                               <div style="color:black; border: 1px solid #fff;
width: 15px;
height: 15px;
text-align: center; margin-left: 3px;">2</div>


                            </div>
                            <div style=" float:left;width:10px; word-wrap:break-word;">

                                <div style="color:black; border: 1px solid #fff;
width: 15px;
height: 15px;
text-align: center; margin-left:15px;">3</div>

                     </div>
<div style=" float:left; width:150px; word-wrap:break-word;">

                                <div style="color:black; border: 1px solid #fff;
width: 15px;
height: 15px;
text-align: center; margin-left:25px;">4</div>


                            </div>
                            <div style=" float:right; margin-right:16px;">

                                <div style="color:black;">Total: <?php  
                                
                                if($ttl!='n') { echo $ttl; }
                                $total=$nj->total('My_Bills',$username); 
                                $ec=mysql_fetch_row($total);
                                 echo $ec[0];
                                 
                                ?></div>


                            </div>
                            
                            
</div>

</div>
</div>
                  










<!-- 
 <div id="dialog1" title="Basic dialog">
  <p>
    <form>
      <input type="text" name="cat">

<input type="submit" value="Add">
    </form>


  </p>
</div>

<div id="dialog2" title="Basic dialog">
  <p>
    
    <form>
      <input type="text" name="cat">

<input type="submit" value="Add">
    </form>


    
  </p>
</div> -->

<!-- <button id="popup_window" data-popup-target="#example-popup">Open The Light Weight Popup Modal</button> -->
 
<div id="example-popup" class="popup">
    <div class="popup-body"><span class="popup-exit"></span>
 
        <div class="popup-content">
            <h2 class="popup-title">Add new Category</h2>
 <form method="post">
 <input type="text" name="catname">
 <input type="submit" name="cat_add" value="Add">
            </form>
        </div>
    </div>
</div>

<div id="example-popup2" class="popup">
    <div class="popup-body"><span class="popup-exit"></span>
 
        <div class="popup-content">
            <h2 class="popup-title">Add new type</h2>
 <form method="post">
 <input type="text" name="type">
 <input type="submit" name="type_add" value="Add">
       </form>     
        </div>
    </div>
</div>


<div class="popup-overlay"></div>
<?php
if(isset($_POST['cat_add']))
{
 $cat=$_POST['catname'];

$ert=mysql_query("SELECT * FROM  `category` WHERE cat='$cat' ");
if (mysql_num_rows($ert)==1) {
  echo '<script>alert("Category already exists");</script>';
}else
{

mysql_query("INSERT INTO `category` values('NULL','$cat')");
echo '<script>alert("New Category has been added into database");</script>';
}

}






if(isset($_POST['type_add']))
{
 $type=$_POST['type'];

$ert=mysql_query("SELECT * FROM  `procedure_types` WHERE procedure_name='$type' ");
if (mysql_num_rows($ert)==1) {
  echo '<script>alert("Procedure already exists");</script>';
}else
{

mysql_query("INSERT INTO `procedure_types` values('NULL','$type')");
echo '<script>alert("New Procedure has been added into database");</script>';
}

}


if(isset($_POST['editktna']))
{

$ktna=$_POST['ktna'];
$id= $ktna[0];
$patient_name= $ktna[1];
$procedure_name= $ktna[2];
$hospital= $ktna[3];
$bill_date= $ktna[4];
$Charge= $ktna[5];
$type= $ktna[6];

mysql_query("update My_Bills set 
  patient_name=         '$patient_name',
  procedure_name=       '$procedure_name',
  hospital=             '$hospital',
  appx_chrg=            '$Charge',
  bill_date=            '$bill_date',
  procedure_type_id=    '$type'
  WHERE id='$id'");
echo '<img style="width: 200px;margin-left: 400px;" src="img/ajax-loader22.gif">';
echo '<meta http-equiv="refresh" content="1"; url=billing.php?req=data has been updated" />';
//header('location:billings.php?req=data has been updated');

}






?>