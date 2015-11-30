<?php
ob_start();
//error_reporting(0);
session_start();
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

  $msqle=mysql_query("select * from doctor_detail where email='$username'")or die(mysql_error()."  ERROR107  ");
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
   $myweb=$mft['myweb'];
   $myclinic=$mft['myclinic'];
 
 
 if(isset($_POST['save']))
 {
 $kortana=$_POST['kortana'];
 
 $_FILES['myfile'];
 
 if(empty($_FILES['myfile']['name']))
 {
 mysql_query("update doctor_detail set `name`='$kortana[0]', `lastname`='$kortana[1]', `address`='$kortana[3]',`phone`='$kortana[4]',`gender`='$kortana[5]',`speciality`='$kortana[6]',`department`='$kortana[7]',`facebook`='$kortana[8]',`twitter`='$kortana[10]',`linkedin`='$kortana[9]',`googleplus`='$kortana[11]',`myweb`='$kortana[12]',`myclinic`='$kortana[13]' where `email`='$username'")or die(mysql_error()."error line no 46");
$mms="You profile has been updated 127";
 $mms=base64_encode($mms);
 header('location:Doctor_Profile.php?u='.$mms.'');  
 }
 else
 {
 $FileName=$_FILES['myfile']['name'];
 $FileType=$_FILES['myfile']['type'];
 $FileSize=$_FILES['myfile']['size'];
 $FileTmpName=$_FILES['myfile']['tmp_name'];
 if($FileType!='image/jpeg' && $FileType!='image/png' && $FileType!='image/jpg')
 {
 $recho ="Invalid Image format.Supported images format is (.jpg) (.png) (.jpeg)    eg:(mypic.jpg)";
 $recho=base64_encode($recho);
 header('location:Doctor_Profile.php?e='.$recho.'');
 
 }else
 {
 $mainFolder="mydocs/";
 $merge=$mainFolder.$username."/";
 $newMerge=$merge."profile/";
 $newNAme=$newMerge."/".$FileName;
 if(!file_exists($merge."profile"))
 {
  //echo $newMerge;
 //echo $newMerge;
 //chmod($merge, 777);
 mkdir("mydocs/".$username) or die("Got an error Here line number 72");
 $hk="mydocs/".$username;
 mkdir($hk."/profile")or die("76");
 mysql_query("update doctor_detail set `pic`='$newNAme', `name`='$kortana[0]', `lastname`='$kortana[1]', `address`='$kortana[3]',`phone`='$kortana[4]',`gender`='$kortana[5]',`speciality`='$kortana[6]',`department`='$kortana[7]',`facebook`='$kortana[8]',`twitter`='$kortana[10]',`linkedin`='$kortana[9]',`googleplus`='$kortana[11]',`myweb`='$kortana[12]',`myclinic`='$kortana[13]' where `email`='$username'")or die(mysql_error()."Line no 77");
 move_uploaded_file($FileTmpName,$newMerge."/".$FileName);
 $mms="You profile picture has been updated 128";
 $mms=base64_encode($mms);
 header('location:Doctor_Profile.php?u='.$mms.'');
 }else
 
 {
  echo "<script>alert('Exits')</script>";
 mysql_query("update doctor_detail set `pic`='$newNAme', `name`='$kortana[0]', `lastname`='$kortana[1]', `address`='$kortana[3]',`phone`='$kortana[4]',`gender`='$kortana[5]',`speciality`='$kortana[6]',`department`='$kortana[7]',`facebook`='$kortana[8]',`twitter`='$kortana[10]',`linkedin`='$kortana[9]',`googleplus`='$kortana[11]',`myweb`='$kortana[12]',`myclinic`='$kortana[13]' where `email`='$username'")or die(mysql_error()."Line no 86");
 move_uploaded_file($FileTmpName,$newMerge."/".$FileName);
 $mms="You profile picture has been updated 129";
 $mms=base64_encode($mms);
 header('location:Doctor_Profile.php?u='.$mms.'');
 
 }
 
 
 
 }
 
 
 
 }
 
 }
  
  
?>
<!--<link href="css/style_home.css" rel="stylesheet">-->
 <div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:none !important;" >
<div class="row">

	
</div>
</div>
<?php
if(!empty($_REQUEST['u']))
{
?>	
<div class="alert alert-success" role="alert">
        <strong>Well done!</strong> <?php echo base64_decode($_REQUEST['u']); ?>.
      </div>
<?php
}
?>

<?php
if(!empty($_REQUEST['e']))
{
?>
<div class="alert alert-danger" role="alert">
        <strong>Oh snap!</strong><?php echo  base64_decode($_REQUEST['e']); ?>.
      </div>

<?php
}
?>


  <div style="clear:both; "></div>

   <form method="post" enctype="multipart/form-data">
            <div class="hero-unit h_top" style="padding:0px; background: none !important;">
            	<div class="row" style="margin-left:0px;">
            	    <div style=" float:left; margin-left:1px; width:auto; border:1px solid #eee; background:#edf0f5; height:650px;"><img <?php if($pic1=="") { ?> src="img/icon-user-default.png" <?php }else { ?> src="<?php echo $pic1; ?>" <?php } ?>   style="width:155px; height:200px; margin:5px;" />
                   <div style="text-align:center; margin-bottom:30px;"> <span style="font-size:15px; font-weight:bold;width:145px;" class="btn btn-info">Change Picture<input type="file" class="btn btn-info" id="myfile" name="myfile" style="font-size:21px; font-weight:bold;width:130px;" value="img/c.png" /></span></div>
                   
                    <div style="text-align:center;  margin-bottom:70px; font-size:22px; font-weight:bold;">Packages<br><?php $mysql=mysql_query("SELECT COUNT(id) FROM `packages` WHERE `doc_id`='$username'"); $qwerty=mysql_fetch_row($mysql); echo $qwerty[0]; ?></div>
                    <div style="text-align:center; font-size:24px;   margin-bottom:1px; line-height:173px;font-weight:bold;">Social Link</div>
                    <div style="text-align:center;">
                         <a <?php if(!empty($facebook1)) { ?> href="<?php echo $facebook1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> ><img src="img/Facebook-icon.png" style="width:25px; height:25px;" /></a>
                         <a <?php if(!empty($google_plus1)) { ?> href="<?php echo $google_plus1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> > <img src="img/GooglePlus-icon.png" style="width:25px; height:25px;" /></a>
                          <a <?php if(!empty($linkedin1)) { ?> href="<?php echo $linkedin1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> ><img src="img/LinkedIn-icon.png" style="width:25px; height:25px;" /></a>
                          <a <?php if(!empty($twitter1)) { ?> href="<?php echo $twitter1 ?>" target="_blank" <?php }else { ?> href="#" <?php } ?> ><img src="img/Twitter-icon.png" style="width:25px; height:25px;" /></a>
                           
                    
                    </div>
                    
                    </div>
                 
                    
                    <div  style=" float:left; width:760px;  border:1px solid  #eee; background:#edf0f5; height:650px; margin-left:1px;"><span style="float:left; margin:7px 14px;line-height:50px;  font-weight:bold;">Name</span></span><input name="kortana[]" type="text" value="<?php echo $name1; ?>" style="float:left; margin-top:20px; margin-left:21px; width:280px;" />
    <span style="float:left;  margin:7px;line-height:50px; margin-left:16px;  font-weight:bold;" >Last Name</span><input type="text" value="<?php echo $lastname1; ?>" name="kortana[]" style="float:left; margin: 8px;margin-top: 20px; width:230px;" />
     <div  style="float:left; margin-bottom: 20px; margin-top:20px; "> <span style="float:left; margin-left:16px;  font-weight:bold;" >Email</span><input type="text" readonly name="kortana[]" value="<?php echo $username; ?>" style="float:left; margin-left:37px; width:630px;" /> </div>      
   <div style="float:left; margin-bottom: 20px;" >  <span style="float:left;" ><span style="margin-left:13px;  font-weight:bold;">Address</span></span><input type="text" name="kortana[]" value="<?php echo $address1; ?>" style="float:left; margin-left:22px; width:630px;" /> </div>  
     <div style="float:left; margin-bottom:20px;" >  <span style="float:left;" ><span style="margin-left:10px;  font-weight:bold;">Phone No.</span></span><input type="text" name="kortana[]" value="<?php echo $phone1; ?>" style="float:left; width:630px; margin-left:10px;" /> </div> 
       <div style="float:left; margin-bottom: 20px;" >  <span style="float:left;" ><span style="margin-left:10px;  font-weight:bold;">Gender</span></span><input type="text" name="kortana[]" value="<?php echo $gender1; ?>" style="float:left; width:630px; margin-left:35px;" /> </div> 
         <div style="float:left; margin-bottom: 20px;" >  <span style="float:left;" ><span style="margin-left:10px;  font-weight:bold;">Speciality</span></span><input type="text" name="kortana[]" value="<?php echo $speciality1; ?>" style="float:left; width:630px; margin-left:19px;" /> </div> 
           <div style="float:left;" >  <span style="float:left;" ><span style="margin-left:5px;  font-weight:bold;">Department</span></span><input type="text" value="<?php echo $department1; ?>" name="kortana[]" style="float:left; width:630px; margin-left:14px;" /> </div> 
               
               
               
                <div><span style="float:left; margin:7px 14px;line-height:50px;  font-weight:bold;">Facebook</span></span><input type="text" value="<?php echo $facebook1; ?>" name="kortana[]" style="float:left; margin-top:20px; margin-left:8px; width:280px;" />
    <span style="float:left;  margin:6px;line-height:50px; margin-left:8px;  font-weight:bold;" >LinkedIn</span><input type="text" value="<?php echo $linkedin1; ?>" name="kortana[]" style="float:left; margin: 8px;margin-top: 20px; width:256px;" /></div>
    
    <div style="float:left;" >  <span style="float:left;" ><span style="margin-left:16px;  font-weight:bold;">Twitter</span></span><input value="<?php echo $twitter1; ?>" name="kortana[]" type="text" style="float:left; width:277px; margin-left:41px;" />
    <span style="float:left;" ><span style="margin-left:16px;  font-weight:bold;">Google</span></span><input type="text" value="<?php echo $google_plus1; ?>" name="kortana[]" style="float:left; width:254px; margin-left:15px;" />
    
    
     </div> 
           



    <div style="float:left;" >  <span style="float:left;" ><span style="margin-left:11px;  font-weight:bold;">My Website</span></span><input value="<?php echo $myweb; ?>" name="kortana[]" value="http://" type="text" style="float:left; width:277px; margin-left:19px;" />
    <span style="float:left;" ><span style="margin-left:16px;  font-weight:bold;">My Clinic</span></span><input type="text" value="<?php echo $myclinic; ?>" value="http://" name="kortana[]" style="float:left; width:254px; margin-left:15px;" />
    
    
     </div>    
    
          <div style="float:left; margin-left:205px; margin-top:10px;"> <input type="submit" name="save" class="btn btn-inverse"  value="Save" style="width:435px; height:40px; font-size:20px; font-weight:bold;"> </div> 
           
           
                        
                    </div>
                    
                  </div>
                  
              		
  				</div>
                
               </form>

             </div>
             

   		</div>
         
      
  </div>
  
 
</body>
</html>
