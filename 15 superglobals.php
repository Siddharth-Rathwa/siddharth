<?php
//superglobals program 
$a=5;
$b=6;
function sum(){
    $GLOBALS['c']=$GLOBALS['a']+$GLOBALS['b'];
}
sum();
echo "$c";
//$_SERVER[]
echo"<br>";
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";