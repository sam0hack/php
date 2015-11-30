<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style_home.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="header">
 <div style="float:left; margin:5px 10px;"><img src="img/my-heathlogo.png" style="height:75px; width:150px;"></div>
    <div><a class="Hea_lt" href="index.php">[My Health Package]</a></div>
    <form method="post">
    <div style="margin:20px;"><input type="text" placeholder="Search" style="border-radius:15px; height:29px; padding: 1px 12px 0px; border: 1px solid #1990d5; width:210px; margin-left:7%; background-color:#FFF;"/>
  
    <input type="submit" style="background:url(img/search.png) no-repeat right; margin-left:-42px; width:40px; border:none" value="" />

<span></span><span><a href="#" style="margin-left:2%;">Login</a><span style="color:#fff;">&nbsp;/&nbsp;</span><a href="#">Sing up</a></span>
  </div>
  </form>
    <div class="Doc_tor">
     <div class="Doc_torName"><span style="width: 152px;margin-left:10%; font-weight: bold;">Doctor Name/ID</span></div>
     <div  class="Doc_torName" style="width: 185px; font-weight: bold;">Package Name/ID</div>
     <div  class="Doc_torName" style="width: 104px; font-weight: bold;">Details</div>
     <div  class="Doc_torName" style="width:130px; font-weight: bold;">Cost</div>
     <div  class="Doc_torName" style="width:130px; font-weight: bold;">Discount</div>

    </div>
  <?php
  for($i=0;$i<20;$i++)
  {
  ?>
  
  <div class="Doc_torDet_ls">
   <div class="Doc_torName"><img src="img/DSC08574.JPG"  style="width:50px; margin-left:20%; height:50px; border-radius: 70px;"/></div>
    <div class="Doc_torName" style="width: 145px;margin-left:4%;margin-top: 24px;color:#000; word-wrap:break-word; font-size: 14px;">Dr.Abhishek singh</div>
     <div  class="Doc_torName" style="width:160px; color:#000; font-size: 14px; margin-left:2%; word-wrap:break-word; margin-top: 24px;">Hair Transplant</div>
     <div  class="Doc_torName" style="width:140px; color:#000; font-size: 14px; word-wrap:break-word; margin-left:1%;margin-top: 24px;">Sec.110.Noidartttttt</div>
     <div  class="Doc_torName" style="width:95px; color:#000; font-size: 14px; margin-left:1%; word-wrap:break-word;margin-top: 24px;">3,5,000000</div>
     <div  class="Doc_torName" style="width:90px; color:#000; font-size: 14px; margin-left:1%;margin-top: 24px; word-wrap:break-word;">1,00000</div>
 

    
    </div>
  <?php
  }
  ?>
   
    
    
</div>
</body>
</html>
