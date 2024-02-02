<?php
$conn = mysqli_connect("localhost", "root", "", "dbsamsuang");
if ($conn->connect_error) {
    echo "Oops something went wrong";
} else {
    echo "connection sucessfully";
}
?>
<DOCTYPE html>
    <body>
        <form method="post">
            <table>
                <tr>
                    <td>Index.no</td>
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
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $index=$_POST["index"];
                $product=$_POST["product"];
                $Quantity=$_POST["quantity"];
                $color=$_POST["color"];

                $sql="INSERT INTO tblsuamsang(Indexno, Phone, Quantity, Color) VALUES($index, '$product', $Quantity, '$color')";
                if(mysqli_query($conn, $sql)){
                    echo "record submited sucessfully";
                }
                else{
                    echo "Error". mysqli_error($conn);
                }
                mysqli_close($conn);
            }
        ?>
    </body>
</DOCTYPE>