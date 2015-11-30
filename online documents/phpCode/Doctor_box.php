<?php
session_start();
$ival=$_SESSION['ival'];
require 'database.php';
require_once 'functions/ss.php';

$obj= new search();

   $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
                === FALSE ? 'http' : 'https';
$host     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$params   = $_SERVER['QUERY_STRING'];
 
$currentUrl = $protocol . '://' . $host . $script . '?' . $params;
 
 //echo $currentUrl;   
 
 
  //echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}




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
  <script type="text/javascript" src="js/geturl.js"></script> 
  <script type="text/javascript" src="js/jquery.min.js"></script>
<!--JAVASCRIPT AJAX AND add text field-->
<script type="text/javascript" src="js/clinicalpagesamjs.js"></script>
<!--END JAVASCRIPT AJAX


-->

<?php
$i=base64_decode($_REQUEST['id']);
$d=base64_decode($_REQUEST['usr']);

?>
  
  </head>
  
  
  <script src="js/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="css/jqpop.css" />
<script src="js/jqpop.js"></script>
 
 
 
 <link rel="stylesheet" href="css/jquery-ui2.css">
  <!--<script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  -->
  <script>
  $(function() {
    $( "#dialog" ).dialog();
  });
  </script>
  

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
          <li><input type="submit" style="background:url(img/search.png);background-repeat: no-repeat;color: white;width: 55px;height: 31px;border: none;padding-right: 22px;margin: -1px;margin-left:8px;" value="" src="img/search.png" name="isearch" /></li>
         
        </ul>
        
         </form>
        
        
        
        <ul class="nav pull-right" id="main-menu-right">
        
          <li><a href="Login.php" style="color:#FFFFFF; padding: 0px 15px 10px;">LogIn</a></li>
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
 <?php
 if($_REQUEST['ival'])
 {
 
 $iv=$_REQUEST['ival'];
 header('location:searchpackages.php?ival='.$iv.'');
 }

$obj->search_doc($d);
 
 $msqle=mysql_query("select * from doctor_detail where email='$d'")or die(mysql_error()."  ERROR107  ");
  $mft=mysql_fetch_array($msqle);

   $id1=$mft['id'];
   $pic1=$mft['pic'];
   $name1=$mft['name'];
   $phone1=$mft['phone'];
   $lastname1=$mft['lastname'];
   $gender1=$mft['gender'];
   $speciality1=$mft['speciality'];
   $department1=$mft['department'];
   $facebook1=$mft['facebook'];
   $twitter1=$mft['twitter'];
   $linkedin1=$mft['linkedin'];
   $google_plus1=$mft['googleplus'];
   $address1=$mft['address'];
 
?> 
 
 <div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:none !important;" >
<div class="row" >

	
</div>
</div>

	


  <div style="clear:both; "></div>


            <div class="hero-unit h_top" style="padding:0px;      background: none !important;">

         
            
            
            
            <?php
            
            
            if(isset($_REQUEST['imvx']))
{
 $name=$_REQUEST['name'];
 $email=$_REQUEST['email'];
 $contactno=$_REQUEST['contactno'];
 $message=$_REQUEST['message'];
 $did=$_REQUEST['did'];
 $procid=$_REQUEST['procid'];
 mysql_query("insert into contact_toDoc 
 VALUES('NULL','$name','$email','$contactno','$message','$did','$procid')
 ");
 

//Mail system here
//require 'PHPMailer_v5.1/class.phpmailer.php'; #Mail->Class



//Mail system end here 



 echo '<div class="alert alert-success" role="alert">';
 
 echo '<strong>Thank You!</strong>Doctor will contact you soon. <a href="searchpackages.php?ival='.$ival.'">Go Back</a>';
 echo '</div>';
 

exit();
}

if($_REQUEST['a']=='x')
{
$cmail=$_SESSION['cusername'];
$dmail=$_SESSION['username'];
?>


<div id="dialog" title="Contact">
  
  
          
            
            <div id="mainform2" style="margin-top: 244px;margin-left: 356px;">
             <img src="img/ajax-loader.gif">Please wait....
            <script>
            
function validateForm() {
    var email = document.forms["contact"]["email"].value;
    var contactno = document.forms["contact"]["contactno"].value;
    var message = document.forms["contact"]["message"].value;
    //var len=contactno.lenght;
    
    if (email == null || email == "") {
        alert("Email must be filled out");
        return false;
    }

        if (contactno == null || contactno == "") {
        alert("Contact No must be filled out");
        return false;
    }


        if (isNaN(contactno)) {
        alert("Invalid Contact No");
        return false;
    }

    
    
        if (message == null || message == "") {
        alert("message must be filled out");
        return false;
    }

    
    
    
    }
            </script>
 <!-- Contact Form -->
<div id="contactdiv2" style="margin-right: 357px;">
<form class="form" action="" mathod="post" onsubmit="return validateForm()" name="contact" id="contact">
<a href="searchpackages.php?ival=<?php echo $ival; ?>"><img src="img/abc.png" style="width: 40px;height: 40px;" class="img" id="cancel"/></a>
<h3>Contact Form</h3>
<label>Name: <span></span></label>
<input type="hidden" value="<?php echo $_REQUEST['did']; ?>" name="did">
<input type="hidden" value="<?php echo $_REQUEST['procid']; ?>" name="procid">
<input type="text" id="name"  name="name" placeholder="Name"/>
<label>Email: <span>*</span></label>
<input type="text" name="email" id="email" value="<?php if(!empty($cmail)) { echo $cmail; }elseif (!empty($dmail)) {
  echo $dmail;
} ?>" placeholder="Email"/>
<label>Contact No: <span>*</span></label>
<input type="text" id="contactno"  name="contactno" placeholder="Enter  Mobile no."/>
<label>Message:</label>
<textarea id="message" name="message" placeholder="Message......."></textarea>
<input type="submit" name="imvx" style="background-color:#123456;border:1px solid white;font-family: 'Fauna One', serif;font-Weight:bold;font-size:18px;color:white;width:49%" id="imvx" value="Send"/>
<a href="searchpackages.php?ival=<?php echo $ival; ?>"><input type="button" id="cancel" value="Cancel"/></a>
<br/>
</form>
</div>
</div>
  
  
  
  
  
  
  
  
  
</div>



<?php
exit();
}

?>



<div class="row" style="padding-top:0px;padding-bottom:25px;">
<div style="background-color:#A5B9B5; margin-top:25px; width:805px;
padding: 11px 5px;
height: 27px;
margin-left:193px;
position: fixed;">
  <div class="span3" style="word-wrap:break-word; width:200px; margin-left:40px; color:#fff; font-weight:bold; ">Package Name</div>
                    <div class="span3" style="word-wrap:break-word; width:180px; color:#fff;  font-weight:bold; ">Details</div>
                    <div class="span3" style="width:160px; word-wrap:break-word; color:#fff;  font-weight:bold; ">Cost</div>
                       <div class="span3" style="width:110px; word-wrap:break-word; color:#fff;  font-weight:bold; ">Discount</div>


</div>
	</div>
          
            
<!--POPjs-->
            <div class="row" style="margin-left:0px;">
            	    <div style=" float:left; margin-left:1px; width:auto;  background: #A5B9B5 !important;  height:523px;"><img <?php if($pic1=="") { ?> src="img/icon-user-default.png" <?php }else { ?> src="<?php echo $pic1; ?>" <?php } ?> style="width:155px; height:180px; margin:5px;" />
                   
                 
            <p style="text-align:center; color:#fff; font-size:16px; text-shadow:#999999 2px -1px #063; margin-top:35px;"><?php echo $name1 .'&nbsp;'. $lastname1; ?></p>
            <p style="text-align:center;  color:#fff; font-size:16px; text-shadow:#999999 2px -1px #063;"><?php echo $d; ?></p>
            <p style="text-align:center;  color:#fff; font-size:16px; text-shadow:#999999 2px -1px #063;"><?php echo $phone1; ?></p>
            <p style="text-align:center;  color:#fff; font-size:16px; text-shadow:#999999 2px -1px #063; "><?php echo $speciality1; ?></p>
            <p style="text-align:center;  color:#fff; font-size:16px; text-shadow:#999999 2px -1px #063;"><?php echo $department1; ?></p>
                    <div style=" margin-top:46px; margin-left:30px; text-shadow:#999999 2px -1px #063;">
                    
                     <a <?php if(!empty($facebook1)) { ?> href="<?php echo $facebook1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> ><img src="img/Facebook-icon.png" style="width:25px; height:25px;" /></a>
                         <a <?php if(!empty($google_plus1)) { ?> href="<?php echo $google_plus1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> > <img src="img/GooglePlus-icon.png" style="width:25px; height:25px;" /></a>
                          <a <?php if(!empty($linkedin1)) { ?> href="<?php echo $linkedin1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> ><img src="img/LinkedIn-icon.png" style="width:25px; height:25px;" /></a>
                          <a <?php if(!empty($twitter1)) { ?> href="<?php echo $twitter1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> ><img src="img/Twitter-icon.png" style="width:25px; height:25px;" /></a>
                    
                    </div>
                    
                    
                    </div>
                    <div  style="   width:auto;   overflow:scroll; overflow-x:hidden; background-color:#B5CECE; margin-top:53px; height:470px; margin-left:6px;">
                  <div class="hero-unit1 h_top2 r_b2" style="background:none !important; margin-bottom:5px;  border-radius:0px; color:#fff; font-weight:bold;" >
<div class="row">


	
                  
   
</div>
                        

</div>
    <?php
 
 $msq=mysql_query("SELECT * FROM packages where doc_id='$d' ORDER BY id ='$i' DESC ")or die(mysql_error()."CH");
 while($mys=mysql_fetch_array($msq))
 {
 
 ?>
 

  <div class="hero-unit h_top" style="padding:0px;border-radius:0px; margin-top:-25px;   background-color:aliceblue;" >
            	
            	<div class="row" style="margin-left:0px;">

                         <div class="span2" style="word-wrap:break-word; margin-top:1%; width:207px;"><?php echo $mys['package']; ?></div>
                          <div class="span2" style="word-wrap:break-word; margin-top:1%; width: 198px;"><?php echo $mys['pdetails']; ?></div>
                          <div class="span2" style="word-wrap:break-word; margin-top:1%;"><?php echo $mys['cost']; ?> </div>
                           <!--<span style="margin-left:53px;"><?php echo $mys['discount']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#<?php echo  $mys['id']; ?>" class="onclick">Know more</a></span>-->
                             
                            <div class="span2" style="word-wrap:break-word; margin-top:1%;"><?php echo $mys['discount']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="Doctor_box.php?a=x&procid=<?php echo  $mys['id']; ?>&did=<?php echo $d; ?>" >Know more</a></div>
                            
                             </div>
                             </div>

                            
                             
<?php
  

 }
  
  ?>
                             

                             


                    </div>
                    
  
  
  </div>
                  
              		
  				</div>
                
      
               
               
             </div>
             
             
             
             

   		</div>
         
         
         
      
  </div>
  
</body>
</html>
	
