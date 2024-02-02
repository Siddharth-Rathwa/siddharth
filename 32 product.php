<?php
$conn=mysqli_connect("localhost", "root", "", "dbproduct");
if($conn->connect_error){
    echo "Oops...something went wrong";
}
else{
    echo "connection successfully";
}
?>
<table width="40%">
    <tr>
        <th>INDEX.NO</th>
        <th>PRODUCTS NAME</th>
        <th>QUANTITY</th>
        <th>SELLING</th>
        <th>PRICE</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    <?php
    $result=mysqli_query($conn, "select * from tblproducts");
    while($row=$result->fetch_assoc()){
        echo "
        <tr>
            <td>$row[Indexno]</td>
            <td>$row[Products]</td>
            <td>$row[Quantity]</td>
            <td>$row[Selling]</td>
            <td>$row[Price]</td>
            <td><a href='32 product.php? eid=$row[Indexno]'>Edit</a></td>
            <td><a href='32 product.php? did=$row[Indexno]'>Delete</a></td>
        </tr>
        ";
    }
    ?>
</table>
<a href="33 product.php">insert Record</a>
<?php
// set the delete code
if(isset($_GET['did'])){
    $did=$_GET['did'];
    $sql="DELETE FROM tblproducts WHERE Indexno=$did";
    if(mysqli_query($conn, $sql)){
        echo "Record delete sucessfully";
        header("location:32 product.php");
    }
    else{
        echo "Error ". mysqli_error($conn);
    }
}
//set the edit code

if(isset($_GET['eid'])){
    $eid=$_GET['eid'];
    $result=mysqli_query($conn,"select * from tblproducts where Indexno=$eid");
    while($row=$result->fetch_assoc()){
        echo"
        <form method='post' name='form'>
        <table>
            <tr>
                <td>Index.no</td>
                <td>:</td>
                <td><input type='text' name='index' value='$row[Indexno]' readonly></td>
            </tr>
            <tr>
                <td>Products name</td>
                <td>:</td>
                <td><input type='text' name='products' value='$row[Products]'></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><input type='text' name='quantity' value='$row[Quantity]'></td>
            </tr>
            <tr>
                <td>Selling</td>
                <td>:</td>
                <td><input type='text' name='selling' value='$row[Selling]'></td>
            </tr>
            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input type='text' name='price' value='$row[Price]'></td>
            </tr>
            <tr>
                <td><input type='submit' value='Update' name='update'></td>
            </tr>
        </table>
    </form>
        ";
    }
    
}
if(isset($_POST["update"])){
    $index=$_POST['index'];
    $product=$_POST['products'];
    $quantity=$_POST['quantity'];
    $selling=$_POST['selling'];
    $price=$_POST['price'];

    $sql="UPDATE tblproducts SET Indexno=$index, Products='$product', Quantity=$quantity, Selling=$selling, Price=$price WHERE Indexno=$eid";
    if(mysqli_query($conn, $sql)){
        echo "Edit sucessfully";
        header("location:32 product.php");
    }
    else{
        echo "Error ". mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>