<?php
define("GREETING", "hello, Good morning");
echo GREETING;

// case insensitive
define("GREETING", "hello, Good morning", true);
echo greeting;

//const in array
define("cars",[
    "BMW",
    "toyota",
    "rose-roylls"
]);
echo cars[0];

define("GREETING","how are you");
function greeting(){
    echo GREETING;
}
greeting();