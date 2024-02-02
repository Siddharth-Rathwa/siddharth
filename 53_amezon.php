<?php
    error_reporting(0);
    $conn=mysqli_connect("localhost", "root", "", "dbamezon");
    if($conn){
        echo"connection successfully";
    }
    else{
        echo"connection failed". mysqli_connect_errno();
    }
?>
<html>
    <body>
        <table width="50%">
            <tr bgcolor="orange">
                <th>Product Id</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Comprice</th>
                <th>Offer Price</th>
                <th>Description</th>
                <th colspan="2">Update</th>
            </tr>

            <?php
                $result=mysqli_query($conn, "select * from tblamezon");
                while($row=$result->fetch_assoc()){
                    echo "
                        <tr bgcolor='whitesmoke'>
                            <td>$row[Productid]</td>
                            <td><img src='$row[Productimg]' height='150px' width='150px'></td>
                            <td>$row[Productname]</td>
                            <td>$row[Comprice]</td>
                            <td>$row[Offprice]</td>
                            <td>$row[Desproduct]</td>
                            <td><a href='53_amezon.php? eid=$row[Productid]'>Edit</a></td>
                            <td><a href='53_amezon.php? did=$row[Productid]'>Delete</a></td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </body>
</html>
<?php
    if(isset($_GET["did"])){
        $did=$_GET['did'];
        $sql="DELETE FROM tblamezon where Productid=$did";
        if(mysqli_query($conn, $sql)){
            header("location:53_amezon.php");
        }
        else{
            echo "Error". mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    if(isset($_GET["eid"])){
        $eid=$_GET['eid'];
        $result=mysqli_query($conn, "select * from tblamezon");
        while($row=$result->fetch_assoc()){
    ?>
                <form name="form" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td>Product Id</td>
                <td><input type="text" name="Productid" value="<?php  echo $row['Productid']?>"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="Fronttoupload"></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="Productname" value="<?php  echo $row['Productname']?>"></td>
            </tr>
            <tr>
                <td>Company Price</td>
                <td><input type="text" name="Companyprice" value="<?php  echo $row['Comprice']?>"></td>
            </tr>
            <tr>
                <td>Offer price</td>
                <td><input type="text" name="Offerprice" value="<?php  echo $row['Offprice']?>"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="3" cols="20" name="Description" value="<?php  echo $row['Desproduct']?>"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
            <?php
        }
    }
        if(isset($_POST['submit'])){
        $productid=$_POST['Productid'];
        $productname=$_POST['Productname'];
        $comprice=$_POST['Companyprice'];
        $offprice=$_POST['Offerprice'];
        $desproduct=$_POST['Description'];

        $filename=$_FILES["Fronttoupload"]["name"];
        $tmpname=$_FILES["Fronttoupload"]["tmp_name"];
        $folder="amezon/". $filename;
        move_uploaded_file($tmpname, $folder);
        // set the query
        $sql="UPDATE tblamezon SET Productid=$productid, Productimg='$folder', Productname='$productname', Comprice=$comprice, Offprice=$offprice, Desproduct='$desproduct'";
        if(mysqli_query($conn, $sql)){
            header("location:53_amezon.php");
        }
        else{
            echo "Error". mysqli_error($conn);
        }
        mysqli_close($conn);
        }
?>