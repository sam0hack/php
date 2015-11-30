<head>
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
<script>

function lookup_cms()
    {
var cmsv="hello";
alert(cmsv);
    //var val=document.getElementById(cmsid).value;
    //var id=document.getElementById('div').value;
    
    //var val=srch;
    
            //$("#suggestions_cus").show();
                        $.ajax({ 
                           url:'location.php?cms='+cmsv,
                              success:function(data){
                                //$("#autoSuggestionsList_cus").html(data);
                              }
                        });
}





</script>

</head>
<input type="button" value="click me" onclick="lookup_cms()">
<?php

     $x = $_REQUEST['cms'];
     echo $x;
   echo "ok";
?>