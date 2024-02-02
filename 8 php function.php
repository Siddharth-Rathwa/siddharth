<?php declare(strict_types=1);
// function addNumbers(int $a, int $b) {
//   return $a + $b;
// }
// echo addNumbers(5,5); 
// since strict is NOT enabled "5 days" is changed to int(5), and it will return 10

function height(int $height){
    echo "The height is ".$height. "<br>";
}
height(78);
height(18);
height(90);
height(17);
?>
<?php 

echo "Welcome to the world of PHP";
//$no1=30;
//$no2=50;

if(isset($_POST['submit']))
{
    echo "<script>alert('Button Clicked...');</script>";

    $no1=$_POST['n1'];
    $no2=$_POST['n2'];

    $ans=$no1+$no2;

    echo "<br> Sum is: ".$ans;

}
 


?>

<body>
    <form method="post">
       Enter num 1: <input type=text name="n1">
       <br>
       Enter num 2: <input type=text name="n2">
       <br>
       <input type="submit" name="submit" value="submit">
    </form>
</body>