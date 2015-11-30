<?php


class DataInsert
{



function INSERT($data,$table,$docid)
{

$pname=$data[0];
$proc=$data[1];
$hosp=$data[2];
$bdate=$data[3];
$chrg=$data[4];
$type=$data[6];
$cat=$data[5];


mysql_query("INSERT INTO $table 

(`id`, `doc_id`, `patient_name`, `procedure_name`, `hospital`, `appx_chrg`, `bill_no`, `bill_date`, `procedure_type_id`,`cat`)
VALUES('NULL','$docid','$pname','$proc','$hosp','$chrg','billno','$bdate','$type','$cat')")or die(mysql_error()." pp");


}




function SELECT($table,$order,$username)
{
$t=mysql_query("select * from $table WHERE doc_id='$username' ORDER by id $order ")or die(mysql_error()."dsssssssssss");

return $t;

}



function total($tab,$username)
{

$t=mysql_query("select SUM(`appx_chrg`) from $tab WHERE doc_id='$username' ")or die(mysql_error()."dsssssssssss");
return $t;
	
}




}

?>
