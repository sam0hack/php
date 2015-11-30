function lookup_cms22()
    {
 var abc=location.href;
 alert("sddsds");   
 
 //var val=document.getElementById(cmsid).value;
    //var id=document.getElementById('div').value;
    
    //var val=srch;
    
          //  $("#suggestions_cus").show();
                        $.ajax({ 
                           url:'Doctor_box.php?cms22='+abc,
                              success:function(data){
            //                    $("#autoSuggestionsList_cus").html(data);
                              }
                        });
}


