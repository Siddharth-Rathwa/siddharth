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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product form</title>
</head>
<body>
    <form name="form" method="post" enctype="multipart/form-data">
        <table>
        <tr>
                <td>Product Id</td>
                <td><input type="text" name="Productid" required></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td><input type="file" name="Fronttoupload" required></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="Productname" required></td>
            </tr>
            <tr>
                <td>Company Price</td>
                <td><input type="text" name="Companyprice" required></td>
            </tr>
            <tr>
                <td>Offer price</td>
                <td><input type="text" name="Offerprice" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea rows="3" cols="20" name="Description" required></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if(isset($_POST["submit"])){
        $productid=$_POST['Productid'];
        $productname=$_POST['Productname'];
        $comprice=$_POST['Companyprice'];
        $offprice=$_POST['Offerprice'];
        $desproduct=$_POST['Description'];

        $filename=$_FILES["Fronttoupload"]["name"];
        $tmpname=$_FILES["Fronttoupload"]["tmp_name"];
        $folder="amezon/". $filename;
        move_uploaded_file($tmpname, $folder);
        // insert the query

        if($productid!=""&&$folder!=""&&$productname!=""&&$comprice!=""&&$offprice!=""&&$desproduct!=""){
            $sql="INSERT INTO tblamezon (Productid, Productimg, Productname, Comprice, Offprice, Desproduct) VALUES ($productid, '$folder', '$productname', $comprice, $offprice, '$desproduct')";

            if(mysqli_query($conn, $sql)){
            echo" <script>alert('Record submit successfully')</script>";
            header("location:53_amezon.php");
            }
            else{
            echo "<pre>";
            echo "Error". mysqli_error($conn);
            }
            mysqli_close($conn);


        }
        else{
            echo "<script>alert('Please fill up details')</script>";
        }
        
    }
?>
<button><a href="53_amezon.php" style="text-decoration:none; color:black">Show Record</a></button>