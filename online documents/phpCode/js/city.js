/*****
*@author sam
*@version 1.2
*@email   sam.nyx@live.com
*@googlecode   sam0hack
*
*
***/


//CMS START
function lookup_city(cmsv)
    {
var cmsv;


if(cmsv.length==0)
{
$('#suggestions_cus').hide();   
}
else
{
    
//            $("#suggestions_cus").show();
                        $.ajax({ 
                           url:'ajax/getcitysession.php?cms='+cmsv,
                              success:function(data){
                               // $("#autoSuggestionsList_cus").html(data);
                              }
                        });
}


}

