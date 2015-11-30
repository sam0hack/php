<?php


class enc
{

function sam0hack($var)
{

$slt="$$#$@##*#**%*%**iejdinsdjldsnlwh3y837yw08woih3sdnsin987585*JJNINKWI@(*JFUFBRHYR^*RJNFIDND!@@@1438131";
$rtr=sha1($var+$slt);
return $rtr;

}
}

$p="admin";
$gh = new enc();
$r=$gh->sam0hack($p);
//echo $r;
?>
