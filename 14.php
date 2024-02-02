<?php
$cars = array("supra", "laborghini", "rolls royce");
$arrlength = count($cars);
for ($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}
echo "<br>";

//associative arrays
$age = array("siddharth" => "18", "mahir" => "17", "ayush" => "16");
$arrlength = count($age);
foreach ($age as $x => $val) {
    echo "key= " . $x . ", value= " . $val . "<br>";
}

//multidimensional arrays
$bike = array(
    array("bullet", 22, 18),
    array("kwasaci", 34, 23),
    array("bugati", 20, 15)
);

for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row Numbers $row </b></p>";
    echo "<ul>";
    for ($cols = 0; $cols < 3; $cols++) {
        echo "<li>" . $bike[$row][$cols] . "</li>";
    }
    echo "</ul>";
}

//sorting arrays
$numbers = array(4, 47, 7, 78, 1, 6, 8);
sort($numbers);
$arrlength = count($numbers);
for ($x = 0; $x < $arrlength; $x++) {
    echo $numbers[$x] . ",";
}
echo "</br>";

//resort numbers
rsort($numbers);
$arrlength = count($numbers);
for ($x = 0; $x < $arrlength; $x++) {
    echo $numbers[$x] . ",";
}
echo "</br>";
//asort
$age = array("siddharth" => "18", "mahir" => "17", "ayush" => "16");
asort($age);
$arrlength = count($age);
foreach ($age as $x => $val) {
    echo "key= " . $x . ", value= " . $val . "</br>";
}
echo "</br>";
//ksort
$age = array("siddharth" => "18", "mahir" => "17", "ayush" => "16");
ksort($age);
$arrlength = count($age);
foreach ($age as $x => $val) {
    echo "key= " . $x . ", value= " . $val . "</br>";
}
echo "<br>";
//asort
asort($age);
$arrlength = count($age);
foreach ($age as $x => $val) {
    echo "key= " . $x . ", value= " . $val . "</br>";
}
echo "<br>";
ksort($age);
$arrlength = count($age);
foreach ($age as $x => $val) {
    echo "key= " . $x . ", value= " . $val . "</br>";
}
