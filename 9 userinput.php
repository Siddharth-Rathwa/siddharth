<body>
    <form method="post">
        Enter num 1: <input type="text" name="n1">
        <br>
        Enter num 2: <input type="text" name="n2">
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST['submit'])){
    $no1=$_POST['n1'];
    $no2=$_POST['n2'];
    $ans=$no1+$no2;
    echo"<br> Sum is: ".$ans;
}
?>