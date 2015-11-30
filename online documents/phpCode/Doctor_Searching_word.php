 <?php require_once 'admin_headwithsearch.php'; ?>


  <script type="text/javascript" src="js/geturl.js"></script> 
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/adata.js"></script>
  <!--JAVASCRIPT AJAX AND add text field-->
  <script type="text/javascript" src="js/clinicalpagesamjs.js"></script>
  <!--END JAVASCRIPT AJAX-->

  

  <script src="js/bsa.js"></script>

 
  <!---CHK HERE suggestions-->



 <div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:none !important;" >
<div class="row" style="margin-bottom:-12px; margin-left:-122px;">

	<div style="background-color:rgb(60, 88, 114); text-align:center; float:left;  width:480px; height:26px;padding:10px; margin-bottom:3px; "> 
                       <h2 style="color:#fff; line-height:6px;">Highest Search Keywords</h2></div>
                       
                       <div style="background-color:rgb(37, 74, 109);  float:left;  text-align:center; margin-left:2px; width:480px; height:26px;padding:10px; margin-bottom:3px; "> 
                       <h2 style="color:#fff; line-height:6px;">Today's Search Keywords</h2></div>
                       
                       
  <div style="background-color:#7EA5A5; text-align:center; float:left;  color:#fff; font-weight:bold;  width:481px; height:22px;padding:10px; margin-bottom:3px; "> 
                      <div class="span3" style="word-wrap:break-word; width:150px; margin-left:-25px; ">Keywords</div>
<!--                    <div class="span3" style="word-wrap:break-word; width:100px; ">Package</div>-->
                    <div class="span3" style="width:137px; word-wrap:break-word; ">Total No. of search</div>
                       <div class="span3" style="width:111px; word-wrap:break-word; ">Last search date</div>
                       </div>
                       
                       
                       <div style="background:#509494;  float:left;   color:#fff; font-weight:bold; text-align:center; margin-left:2px; width:480px; height:22px;padding:10px; margin-bottom:3px; "> 
                       
                       <div class="span3" style="word-wrap:break-word; width:150px; margin-left:-25px; ">Keywords</div>
    <!--                <div class="span3" style="word-wrap:break-word; width:120px; ">Package</div>-->
                    <div class="span3" style="width:137px; word-wrap:break-word; ">Total No. of search</div>
                       <!-- <div class="span3" style="width:110px; word-wrap:break-word; ">date</div> -->
                       </div>
</div>
</div>

	


  <div style="clear:both; "></div>


       
                
                   
            <div class="row" style="margin-left:0px; ">
            	    <div style=" float:left; margin-left:-123px; width:500px; overflow:scroll; overflow-x:hidden;  background: #A5B9B5 !important; height:400px; color:#fff; font-family: serif;">
                    <?php
 require_once 'database.php';

  
  ?>
<div id="adata"></div>

   
                    </div>
                      
                    <div  style=" float:left;  width:500px;  overflow:scroll; overflow-x:hidden; background-color:#B5CECE; height:400px; margin-left:3px;">
                  <div class="hero-unit1 h_top2 r_b2" style="background:none !important; border-radius:0px; color:#fff; font-family: serif; " >
<div class="row" style="margin-left:0px;">

 
        <?php
  date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
  $tmnm=mysql_query("SELECT * FROM `searching_words` where date='$date'  order by  id DESC");
while($toj=mysql_fetch_object($tmnm))
 {
 
 ?>
  <?php 
 //
  ?>
  

   <div style=" margin-left:10px; width:200px; word-wrap:break-word; float:left;"><?php echo $toj->search_word; ?></div>
   
<!--   <div style="  width:134px; float:left;  word-wrap:break-word; "><?php echo $toj->search_word; ?></div>-->
    <div style=" width:150px;  float:left;  word-wrap:break-word; "><?php echo $toj->count; ?></div>
     <div style=" width:76px; float:left;   word-wrap:break-word; "><?php echo $toj->date; ?></div>
 
    
          <?php
  

 }
  
  ?>              
	
                 
   
</div>
                        

</div>
    
  
  
                             

                             


                    </div>
                    
  
  
  </div>
                  
              		
  				</div>
                
      
               
               
             </div>
             
             
             
             

   		</div>
         
         
         
      
  </div>
  
</body>
</html>
