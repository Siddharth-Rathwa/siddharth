<?php
$x=4567;
var_dump(is_int($x));
echo "<br>";
$y=45.67;
var_dump(is_int($y));

$x=45.67;
echo "<br>";
var_dump(is_float($x));
echo "<br>";
$y=45.67;
var_dump(is_int($y));
echo "<br>";

$x=1.9e411;
var_dump($x);
echo "<br>";

$y=acos(8);
var_dump($y);
echo "<br>";

$a=23;
var_dump(is_numeric($a));
echo "<br>";
$a="hello";
var_dump(is_numeric($a));
echo "<br>";
//casting numbers
$c=345.78;
$int_cast=(int)$c;
echo $int_cast;
echo "<br>";
$y="456.78";
$int_cast=(int)$y;
echo $int_cast;