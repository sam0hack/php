<?php
function unhack($a)
{
$aa=mysql_real_escape_string(htmlentities(trim(strip_tags(stripslashes($a)))));
return $aa;
}

function imgsize($size)
{

	if ($size > 5242880)
	{
		$result=FALSE;
	  return $result;
	}
	else 
	{
		$result=TRUE;
	 return $result;
	}
	
}

function isimg($img)
{
	if (!preg_match("/\.(gif|jpg|jpeg|png|bmp)$/i", $img))
	{
		$return=FALSE;
	return $return;
	
	}
	
else 
{
		$return=TRUE;
	return $return;
	
}

}

?>