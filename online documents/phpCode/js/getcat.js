/*****
*@author sam
*@version 1.2
*@email   sam.nyx@live.com
*@googlecode   sam0hack
*
*
***/


//CMS START
function lookup_cms(cmsv,cmsid)
    {
var cmsv;
var cmsid;

if(cmsv.length==0)
{
$('#suggestions_cus').hide();   
}
else
{
    //var val=document.getElementById(cmsid).value;
    //var id=document.getElementById('div').value;
    
    //var val=srch;
    
            $("#suggestions_cus").show();
                        $.ajax({ 
                           url:'ajax/getcat.php?cms='+cmsv+'&cmsid='+cmsid,
                              success:function(data){
                                $("#autoSuggestionsList_cus").html(data);
                              }
                        });
}


}




// function getsrch() {
// form = document.forms[0] //assuming only form.
// form.submit();
// }




function fill2(valee)
{
var str="#"+'cms1';



$(str).val(valee);

//getsrch(valee);


setTimeout("$('#suggestions_cus').hide();",200);   



}




//CMS END
