<?php 
$conn=mysqli_connect("localhost", "root", "","dbflipkart");
if($conn->connect_error){
    echo "Oops...something went wrong";
}
else{
    echo "connection successfully";
}
?>
<!DOCTYPE html>
<head>
    <title>flipkart</title>
</head>
<body>
   <form method="post" name="form">
        <table>
            <tr>
                <td>index.no</td>
                <td>:</td>
                <td><input type="text" name="index"></td>
            </tr>
            <tr>
                <td>Product</td>
                <td>:</td>
                <td><input type="text" name="product"></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td>Color</td>
                <td>:</td>
                <td><input type="text" name="color"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
   </form>
   <?php 
    if(isset($_POST['submit'])){
        $index=$_POST['index'];
        $product=$_POST['product'];
        $price=$_POST['price'];
        $color=$_POST['color'];

        $sql="INSERT INTO tblflipkart(Indexno, Product, Price, Color) VALUES($index, '$product', $price,'$color')";
       if(mysqli_query($conn, $sql)){
            echo "insert sucessully";
       }
       else{
            echo "Error ". mysqli_error($conn);
       }
       mysqli_close($conn);
    }
   ?>
   <a href="34 flipkart.php">show record</a>
</body>