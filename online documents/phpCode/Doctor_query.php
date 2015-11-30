<?php require_once 'admin_headwithsearch.php'; ?>

 <!---CHK HERE suggestions-->

 
 
 <div class="container">

                  <div style="clear:both"></div>
			</div>


  
  <div style="clear:both; "></div>
    
            
<div class="container">
<div class="hero-unit1 h_top2 r_b2" style="background:none !important;" >
<div class="row" style="margin-bottom:-12px; margin-left:3px;">
<!--
	<div style="background-color:rgb(60, 88, 114);    width:700px; height:26px;padding:10px;  float:left; margin-bottom:3px; "> 
                      
                       <span style="color:#fff;  margin-left:10px;  font-weight:bold;">Select Doctor</span>
                       <select style=" margin-left:10px;">
                       <option>Dr.Trun Gupta</option>
                       <option>Dr. Mahesh singh</option>
                       <option>Dr. Ramesh roy</option>
                       </select>
                       <span style="color:#fff;  margin-left:50px; font-weight:bold;">Select Date</span>
                       <select style="">
                       <option>12.03.2014</option>
                       <option>12.05.2014</option>
                       <option>25.06.2014</option>
                       </select>
                       
                       </div>
                       -->
                       
                       
  <div style="background-color:#7EA5A5; text-align:center; float:left;  color:#fff; font-weight:bold;  width:700px; height:22px;padding:10px; margin-bottom:3px; "> 
                      <div class="span3" style="word-wrap:break-word; width: 135px; margin-left:0px;  ">Doctor ID</div>
                    <div class="span3" style="word-wrap:break-word; width:120px; ">Last search date</div>
                    <div class="span3" style="width:120px; word-wrap:break-word; ">Count</div>
                       
                       </div>
                       
                       
</div>
</div>

	


  <div style="clear:both; "></div>


            <div class="hero-unit h_top" style="padding:0px;    position:fixed;  background: none !important;">

  
  
  
  
  
  
  
  
</div>







          
            

                   
                   
                             <div  style=" float:left;  width:720px;  overflow:scroll; overflow-x:hidden; background-color:#B5CECE; height:400px; margin-left:3px;">
                  <div class="hero-unit1 h_top2 r_b2" style="background:none !important; border-radius:0px; color:#000; font-weight:bold; text-shadow:#fff 0px 2px; font-family: serif;" >
<div class="row" style="margin-left:0px;">

 
 <?php
   require_once 'database.php';
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
  $tmnm=mysql_query("SELECT * FROM doctor_search_count where doc!='' order by  id DESC");
while($toj=mysql_fetch_object($tmnm))
 {
  
  ?>
  

   <span style=" width:5px;align-self: auto;"><?php echo $toj->doc; ?></span>
   
   <span style=" padding-left: 75px;">
<?php   
   if($toj->date==$date)
   {
   echo $toj->date."<font size='1px' color='cornflowerblue'>Today</font>";
   }else
   {
   
    echo $toj->date;
   
   }
   ?>
   </span>
    <span style=" padding-left: 84px;"><?php echo $toj->count; ?></span>

 <br>
    
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
