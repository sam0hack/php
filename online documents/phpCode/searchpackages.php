<?php
session_start();
require_once 'functions/ss.php';

$obj= new search();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MY Documents</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
 <link href="css/bootswatch.css" rel="stylesheet">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/main-style.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
<!--JAVASCRIPT AJAX AND add text field-->
<script type="text/javascript" src="js/clinicalpagesamjs.js"></script>
<!--END JAVASCRIPT AJAX-->
  
  
  </head>

<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
 <script src="js/bsa.js"></script>
<div class="navbar navbar-fixed-top">
   <div class="navbar-inner" style="background:#487A97;">
     <div class="container">
     <div class="brand" href="index.php" style="color:#FFFFFF; padding:14px 0px 7px;"><img src="img/st.png" style=" height: 54px;width:170px; margin-left:-100%;"/></div>
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="index.php" style="color:#FFFFFF; padding: 22px 0px 10px;">[My Health Package]</a>
       <div class="nav-collapse" id="main-menu">
        <form method="post" autocomplete="off">
        <ul class="nav" id="main-menu-left" >
          <li><input type="text" id="cms1" onKeyUp="lookup_cms(this.value,this.id);" name="ival" style="margin-left:30px;  border-radius:8px;" /></li>
          <li><input type="submit" style="background:url(img/search.png);background-repeat: no-repeat;color: white;width: 55px;height: 31px;border: none;padding-right: 22px;margin: -5px;margin-left:-34px;" value="" src="img/search.png" name="isearch" /></li>
         
        </ul>
        
         </form>
        
        
        
        <ul class="nav pull-right" id="main-menu-right">
        

<span style="margin-left: -190px">
<?php require 'city.php'; 
$inmycity=$_SESSION['city'];
echo "City is <b>" . $_SESSION['city']."</b>";

?>
</span>
<span style="margin-left: 126px;">
 <?php require_once 'login_status.php'; ?>
      </span>
          <!-- <li><a href="Login.php" style="color:#FFFFFF; padding: 0px 15px 10px;">LogIn</a></li> -->
        </ul>
       </div>
     </div>
   </div>
 </div>
 
 <!---CHK HERE suggestions-->

<div  id="suggestions_cus" style="display:none; fontsize:5px;margin-left:501px;">
                  <ul id="autoSuggestionsList_cus" style="color:rgb(60, 16, 199);border:1px solid black;width: 227px;" onclick=getsrch()>
                  </ul>
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
<!--col rgba(94, 136, 145, 0.85) main-->
<!--col 1 rgba(164, 189, 185, 0.85)-->
<!--col2 col 1 #A5B9B5 !important-->
  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:rgba(70, 95, 100, 0.85) !important;border-radius:0px; height:40px; color:#fff; font-weight:bold;" >
<div class="row">


<?php
if(!empty($_REQUEST['rad']))
{



}
?>




	<div class="span2" style="word-wrap:break-word; margin-left:163px; width:148px;"><h5 style="font-size:18px;">Doctor Name</h5></div>
                    <div class="span2" style="word-wrap:break-word; width:200px; "><h5 style="font-size:18px;">Package Name</h5></div>
                    <div class="span2" style="word-wrap:break-word; width:160px; "><h5 style="font-size:18px;">Details</h5></div>
                    <div class="span3" style="width:80px; word-wrap:break-word; "><h5 style="font-size:18px;">Cost</h5></div>
                       <div class="span3" style="width:110px; word-wrap:break-word; "><h5 style="font-size:18px;">Discount</h5></div>
   
</div>
</div>

	


  <div style="clear:both; "></div>


            <?php
 

 
 $i=0;
  $e=0;
  $ival=$_REQUEST['ival'];
 
 $_SESSION['ival']=$ival;
 
 
//$obj->search_doc("mac");
$obj->search_word($ival);
 
 
 
 
 
 
 $u=mysql_query("select  PK.RKEY,
			 P.RKEY,
			 P.doc_id, 
			 P.package,
			 P.pdetails,
			 P.cost,
			 P.discount,
			 P.RKEY,
			 D.pic,
			 D.name,
			 D.email,
			 P.id
 from packages P , doctor_detail D ,package_keywords PK where P.RKEY=PK.RKEY AND keyword='$ival' AND P.city='$inmycity' AND P.doc_id=D.email group by P.RKEY")or die(mysql_error()."STR");
 
 
 if(mysql_num_rows($u)==0)
 {
 
 ?>
 
 <div class="hero-unit h_top" style="padding:0px;border-radius:0px; width:940px;  background-color:antiquewhite;" >
            	
            	<div class="row" style="margin-left:0px;">
            	    <div class="span2" style="margin-left:400px;">No Package Found</div>
            	    </div>
            	    </div>

 
 <?php
 
 
 } 
//$cntr=0;
 while($erd=mysql_fetch_array($u))
 {

 $id=base64_encode($erd[11]);
 $usr=base64_encode($erd[2]);
 
 ?>
<br>  
            <div class="hero-unit h_top" <?php if($i%2!=0) { echo 'style="background-color:#487A97; color:#fff;padding:0px;border-radius:0px; width:940px; margin-top:-28px;"'; }else { ?> style="padding:0px; width:940px; background:#A5B9B5 !important; color:#fff; border-radius:0px;margin-top:-28px;" <?php } ?> >
            	
            	<div class="row" style="margin-left:0px;">
            	    <div class="span2" style="margin-left:2px;"><img <?php if($erd[8]=="") { ?> src="img/icon-user-default.png" <?php }else { ?> src="<?php echo $erd[8]; ?>" <?php } ?> /></div>
                    <div class="span2" style="word-wrap:break-word; margin-top:4%;"><h5><a style="color:#fff;" href="Doctor_box.php?id=<?php echo $id; ?>&usr=<?php echo $usr; ?>"><?php echo $erd[9]; ?></a></h5>
<a class="btn btn-primary" style="color:#fff;" href="Doctor_box.php?id=<?php echo $id; ?>&usr=<?php echo $usr; ?>">Book</a>
                    </div>
                    <div class="span2" style="word-wrap:break-word; margin-top:4%;"><h5 ><?php echo $erd[3]; ?></h5></div>
                    <div class="span2" style="word-wrap:break-word; width:230px;   margin-top:4%;"><h5><?php echo $erd[4]; ?></h5></div>
                    <div class="span3" style="width:80px; word-wrap:break-word; margin-top:4%;"><h5><?php if($erd[6]!=0) {  echo "<s>".$erd[5]."</s>"; } else echo $erd[5]; ?></h5><h5><?php if($erd[6]!=0) { echo $erd[5]-$erd[6]; } else { echo ""; } ?></h5></div>
                       <div class="span3" style="width:50px; word-wrap:break-word; margin-top:4%;"><h5><?php echo $erd[6]; ?></h5></div>
                      <div class="span3" style="width:64px; float:left; word-wrap:break-word; margin-top:-1%;margin-left: 273px;"><h5></h5></div>
                      
                  </div>
                  
              		
  				</div>
                  <?php
  
 
$i++;
 }
  
  ?>
               

             </div>
             

   		</div>
         
      
  </div>
  
 
</body>
</html>
