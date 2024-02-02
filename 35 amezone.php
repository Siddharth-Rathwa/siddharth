<?php
    $conn=mysqli_connect("localhost", "root", "","dbamezon");
    if($conn->connect_error){
        echo "Oops something went wrong";
    }
    else{
        echo "connectin sucessfully";
    }

?>
<table width="30%">
    <tr>
        <th>Index.no</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Color</th>
    </tr>
    <?php
    $result=mysqli_query($conn, "select* from tblamezon");
    while($row=$result->fetch_assoc()){
        echo"
            <tr>
                <td>$row[Indexno]</td>
                <td>$row[Product]</td>
                <td>$row[Quantity]</td>
                <td>$row[Color]</td>
                <td><a href='35 amezone.php? eid=$row[Indexno]'>Edit</a></td>
                <td><a href='35 amezone.php?did=$row[Indexno]'>Delete</a></td>
            </tr>        
        ";
    }
    ?>
   
</table>
<?php
    if(isset($_GET['did'])){
        $did=$_GET['did'];
        $sql="DELETE FROM tblamezon WHERE Indexno=$did";
        if(mysqli_query($conn, $sql)){
            echo" record delete sucessfully";
            header("location:35 amezone.php");
        }
        else{
            echo"Error". mysqli_error($conn);
        }
    }

    //  created edit query  
    if(isset($_GET['eid'])){
        $eid=$_GET['eid'];
        $result=mysqli_query($conn, "select* from tblamezon where Indexno=$eid");
        while($row=$result->fetch_assoc()){
            echo"
                <form method='post' name='form'>
                    <table>
                        <tr>
                            <td>Indexno</td>
                            <td>:</td>
                            <td><input type='text' name='index' value='$row[Indexno]' readonly></td>
                        </tr>
                        <tr>
                            <td>Product</td>
                            <td>:</td>
                            <td><input type='text' name='product' value='$row[Product]'></td>
                        </tr>
                            <td>Quantity</td>
                            <td>:</td>
                            <td><input type='text' name='quantity' value='$row[Quantity]'></td>

                        <tr>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>:</td>
                            <td><input type='text' name='color' value='$row[Color]'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' value='Edit' name='edit'></td>
                        </tr>
                    </table>
                </form>
            ";
        }
    }
    if(isset($_POST['edit'])){
        $index=$_POST['index'];
        $product=$_POST['product'];
        $Quantity=$_POST['quantity'];
        $color=$_POST['color'];

        $sql="UPDATE tblamezon SET Indexno=$index, Product='$product', Quantity=$Quantity, Color='$color' WHERE Indexno=$eid";

        if(mysqli_query($conn, $sql)){
            echo "Record edit sucessfully";
            header("location:35 amezone.php");
        }
        else{
            echo"Error", mysqli_error($conn);
        }
    }
    
    ?>
<a href="36 amezondisplay.php">Insert Record</a>