<?php
$conn = mysqli_connect("localhost", "root", "", "dbamezon");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "connectin sucessfully";
}
?>
<DOCTYPE html>

    <body>
        <form method="post">
            <table>
                <tr>
                    <td>Indexno</td>
                    <td>:</td>
                    <td><input type="text" name="index"></td>
                </tr>
                <tr>
                    <td>Product</td>
                    <td>:</td>
                    <td><input type="text" name="product"></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td><input type="text" name="quantity"></td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>:</td>
                    <td><input type="text" name="color"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>
            </table>
        </form>
            <?php

            if(isset($_POST['submit'])){
                $index=$_POST['index'];
                $product=$_POST['product'];
                $quantity=$_POST['quantity'];
                $color=$_POST['color'];

                $sql="INSERT INTO tblamezon(Indexno,Product,Quantity,Color) VALUES($index, '$product', $quantity, '$color')";
                if(mysqli_query($conn, $sql)){
                    echo" record created sucessfully";
                }
                else{
                    echo "Error". mysqli_error($conn);
                }
            }
            
            
            ?>
            <a href="35 amezone.php">Show Record</a>
    </body>
</DOCTYPE>