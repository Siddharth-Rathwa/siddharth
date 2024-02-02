<?php  
$conn=mysqli_connect("localhost", "root", "", "dbproduct");
?>
<!DOCTYPE html>
<head>
    <title>products display</title>
</head>
<body>
    <form method="post" name="form">
        <table>
            <tr>
                <td>Index.no</td>
                <td>:</td>
                <td><input type="text" name="index"></td>
            </tr>
            <tr>
                <td>Products name</td>
                <td>:</td>
                <td><input type="text" name="products"></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><input type="text" name="quantity"></td>
            </tr>
            <tr>
                <td>Selling</td>
                <td>:</td>
                <td><input type="text" name="selling"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST["submit"])){
            $index=$_POST['index'];
            $product=$_POST['products'];
            $quantity=$_POST['quantity'];
            $selling=$_POST['selling'];
            $price=$_POST['price'];

            $sql="INSERT INTO tblproducts(Indexno, Products, Quantity, Selling, Price) VALUES($index,'$product', $quantity, $selling, $price)";
            if(mysqli_query($conn, $sql)){
                echo "Record insert sucessfully";
            }
            else{
                echo"Error ". mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
    <a href="32 product.php">show Record</a>
</body>
