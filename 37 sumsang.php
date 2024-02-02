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
        <table width="30%">
            <tr>
                <th>Indexno</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Color</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "select * from tblsuamsang");
            while ($row = $result->fetch_assoc()) {
                echo "
            <tr>
                <td>$row[Indexno]</td>
                <td>$row[Phone]</td>
                <td>$row[Quantity]</td>
                <td>$row[Color]</td>
                <td><a href='37 sumsang.php? eid=$row[Indexno]'>Edit</a></td>
                <td><a href='37 sumsang.php? did=$row[Indexno]'>Delete</a></td>
            </tr>
                ";
            }
            ?>
        </table>
            <?php
            // set the delete query

            if(isset($_GET['did'])){
                $did=$_GET['did'];
                $sql="DELETE FROM tblsuamsang where Indexno=$did";
                if(mysqli_query($conn, $sql)){
                    echo "record delete sucessfully";
                }
                else {
                    echo "Error". mysqli_error($conn);
                }
                mysqli_close($conn);
            }

            // set the edit query
            if(isset($_GET['eid'])){
                $eid=$_GET['eid'];
                $result = mysqli_query($conn, "select * from tblsuamsang where Indexno=$eid");
                while($row=$result->fetch_assoc()){
                    echo "
                    <form method='post' name='form'>
                        <table>
                            <tr>
                                <td>Indexno</td>
                                <td>:</td>
                                <td><input type='text' name='index' value='$row[Indexno]'></td>
                            </tr>
                            <tr>
                                <td>Product</td>
                                <td>:</td>
                                <td><input type='text' name='product' value='$row[Phone]'></td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td><input type='tex' name='quantity' value='$row[Quantity]'></td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>:</td>
                                <td><input type='text' name='color' value='$row[Color]'></td>
                            </tr>
                            <tr>
                                <td><input type='submit' name='edit' value='Edit'></td>
                            </tr>
                        </table>
                    </form>
                ";
                }
                if(isset($_POST['edit'])){
                    $index=$_POST['index'];
                    $product=$_POST['product'];
                    $quantity=$_POST['quantity'];
                    $color=$_POST['color'];

                    $sql="UPDATE tblsuamsang SET Indexno=$index, Phone='$product', Quantity=$quantity, Color='$color' WHERE Indexno=$eid";
                    if(mysqli_query($conn, $sql)){
                        echo "Record edit sucessfully";
                        header("location:37 sumsang.php");
                    }
                    else{
                        echo "Error". mysqli_error($conn);
                    }
                }
                mysqli_close($conn);
               

            }
            ?>
        <a href="38 sumsang.php">Insert Record</a>
    </body>

    </html>