<?php

/**
 * @param Get  $length and Generate random password
 * @return string
 */
function Generator($length)
{
$length=8;
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);


    }
return $result;
}


function GeneratorX()
{
$length=50;
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);


    }
return $result;
}

?>