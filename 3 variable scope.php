<?php
$x=5; //global scope
function mytest(){
    echo"Variables x inside function is: ";
}
mytest();

echo"<br>Variable x outside function is: ".$x;

 $x=5;
 $y=10;
function sum(){
    global $x, $y;
    $y=$x+$y;
}
sum();
echo "<br>".$y;

function sumval(){
    $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
}
sumval();
echo "<br>".$y;

function sta(){
    static $x=0;
    echo "<br>".$x;

    $x++;
}
sta();
sta();
sta();
sta();
sta();


