<?php 
$conn=mysqli_connect("localhost", "root", "","dbflipkart");
if($conn->connect_error){
    echo "Oops...something went wrong";
}
else{
    echo "connection successfully";
}
?>

<table width="30%">
    <tr>
        <th>Index.no</th>
        <th>Product</th>
        <th>Price</th>
        <th>Color</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
        $result=mysqli_query($conn, "select * from tblflipkart");
        while($row=$result->fetch_assoc()){
            echo "
            <tr>
                <td>$row[Indexno]</td>
                <td>$row[Product]</td>
                <td>$row[Price]</td>
                <td>$row[Color]</td>
                <td><a href='34 flipkart.php? eid=$row[Indexno]'>Edit</a></td>
                <td><a href='34 flipkart.php? did=$row[Indexno]'>Delete</a></td>
                
            </tr>
            ";
        }
    ?>
</table>

<?php 
// set the delete code
if(isset($_GET['did'])){
    $did=$_GET['did'];
    $sql="DELETE FROM tblflipkart WHERE Indexno=$did";
    if(mysqli_query($conn, $sql)){
        echo "deleted successfully";
        header("location:34 flipkart.php");
    }
    else{
        echo "Error ". mysqli_error($conn);
    }
}

// set the edit code
if(isset($_GET['eid'])){
    $eid=$_GET['eid'];
    $result=mysqli_query($conn,"select *from tblflipkart where Indexno=$eid");
    while($row=$result->fetch_assoc()){
        echo "
        <form method='post' name='form'>
            <table>
                <tr>
                    <td>Index.no</td>
                    <td>:</td>
                    <td><input type='text' name='index' value='$row[Indexno]' readonly></td>
                </tr>
                <tr>
                    <td>Product</td>
                    <td>:</td>
                    <td><input type='text' name='product' value='$row[Product]'</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td><input type='text' name='price' value='$row[Price]'</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>:</td>
                    <td><input type='text' name='color' value='$row[Color]'</td>
                </tr>
                <tr>
                    <td><input type='submit' name='update' value='Update'</td>
                </tr>
            </table>
        </form>
        ";
    }
}
// set the event
if(isset($_POST['update'])){
    $index=$_POST['index'];
    $product=$_POST['product'];
    $price=$_POST['price'];
    $color=$_POST['color'];

    $sql="UPDATE tblflipkart SET Indexno=$index, Product='$product', price=$price, Color='$color' WHERE Indexno=$eid";
    if(mysqli_query($conn, $sql)){
        echo "Record Edit successfully";
        header("location:34 flipkart.php");
    }
    else{
        echo "Error ". mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<a href="35 flipkart.php">insert record</a>