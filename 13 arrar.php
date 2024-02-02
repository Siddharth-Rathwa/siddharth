<?php

//indexd array
$cars=array("rolls royce", "leborghini", "supra");
$arrlength=count($cars);
for($x=0; $x<$arrlength; $x++){
    echo $cars[$x];
    echo "<br>";
}
echo "<br>";
//associative array
$age=array("siddharth"=>"18", "mahir"=>"18", "ayush"=>"17");
foreach($age as $x=> $val){
    echo "key=" .$x. ", value=". $val. "<br>";
}

//multidimensional arrays
$cars=array(
array("Volvo",22,18),
array("BMW",15,13),
array("Saab",5,2),
array("Land Rover",17,15)
);

for($row=0; $row<4; $row++){
    echo "<p><b>Row numbers $row </b></p>";
    echo "<ul>";
    for($cols=0;$cols<3; $cols++){
        echo "<li>".$cars[$row][$cols]."</li>";
    }
    echo "</ul>";
}

//sorting arrays
$numbers=array(4,5,3,7,8,1);
sort($numbers); //sort arrays in ascending order
$arrlength=count($numbers);
for($x=0; $x<$arrlength; $x++){
    echo $numbers[$x];
    echo "<br>";
}
echo "<br>";
//rsort numbers
rsort($numbers); //sort arrays in descending order
$arrlength=count($numbers);
for($x=0; $x<$arrlength; $x++){
    echo $numbers[$x];
    echo "<br>";
}
echo "<br>";
//asort
asort($age); //sort associative arrays in ascending order, according to the value 
$arrlength=count($age);
foreach($age as $x=> $val){
    echo "key=" .$x. ", value=". $val. "<br>";
}
echo "<br>";
//ksort
ksort($age); //sort associative arrays in ascending order, according to the key 
$arrlength=count($age);
foreach($age as $x=> $val){
    echo "key=" .$x. ", value=". $val. "<br>";
}
echo "<br>";
arsort($age); ////sort associative arrays in descending order, according to the value 
$arrlength=count($age);
foreach($age as $x=> $val){
    echo "key=" .$x. ", value=". $val. "<br>";
}
echo "<br>";
krsort($age); //sort associative arrays in descending order, according to the key
$arrlength=count($age);
foreach($age as $x=> $val){
    echo "key=" .$x. ", value=". $val. "<br>";
}
?>